document.addEventListener('DOMContentLoaded', function() {
    
    // Global variable to store Turnstile token
    let turnstileToken = null;
    let turnstileWidgets = new Map(); // Store widget instances
    
    // Turnstile callback functions
    window.onTurnstileSuccess = function(token) {
        turnstileToken = token;
        console.log('Turnstile verification successful');
    };
    
    window.onTurnstileExpired = function() {
        turnstileToken = null;
        console.log('Turnstile token expired');
    };
    
    window.onTurnstileError = function(error) {
        turnstileToken = null;
        console.error('Turnstile error:', error);
    };
    
    // Function to render Turnstile widget
    function renderTurnstileWidget(container) {
        if (typeof turnstile === 'undefined') {
            console.error('Turnstile script not loaded');
            return;
        }
        
        const siteKey = popupCtaAjax.turnstileSiteKey;
        if (!siteKey) {
            console.error('Turnstile site key not found');
            return;
        }
        
        // Remove any existing widget
        if (turnstileWidgets.has(container)) {
            turnstile.remove(turnstileWidgets.get(container));
        }
        
        // Render new widget with plugin's theme settings
        const widgetId = turnstile.render(container, {
            sitekey: siteKey,
            theme: popupCtaAjax.turnstileTheme || 'light',
            language: popupCtaAjax.turnstileLanguage || 'auto',
            appearance: popupCtaAjax.turnstileAppearance || 'always',
            callback: function(token) {
                turnstileToken = token;
                console.log('Turnstile verification successful');
            },
            'expired-callback': function() {
                turnstileToken = null;
                console.log('Turnstile token expired');
            },
            'error-callback': function(error) {
                turnstileToken = null;
                console.error('Turnstile error:', error);
            }
        });
        
        turnstileWidgets.set(container, widgetId);
    }
    
    // Listen for modal open events - only for CTA modals
    document.addEventListener('click', function(e) {
        if (e.target.matches('button[onclick*="openModal"]')) {
            // Extract modal ID from onclick attribute
            const onclickAttr = e.target.getAttribute('onclick');
            const modalIdMatch = onclickAttr.match(/openModal\('([^']+)'\)/);
            if (modalIdMatch) {
                const modalId = modalIdMatch[1];
                // Only process CTA modals (newsletter and download)
                if (modalId.includes('cta-newsletter') || modalId.includes('cta-download')) {
                    // Wait a bit for modal to be visible, then render Turnstile
                    setTimeout(() => {
                        const modal = document.getElementById(modalId);
                        if (modal) {
                            const turnstileContainer = modal.querySelector('.cf-turnstile');
                            if (turnstileContainer) {
                                renderTurnstileWidget(turnstileContainer);
                            }
                        }
                    }, 100);
                }
            }
        }
    });
    
    // Helper function to serialize form data
    function serializeForm(form) {
        const formData = new FormData(form);
        const params = new URLSearchParams();
        
        for (const [key, value] of formData.entries()) {
            params.append(key, value);
        }
        
        // Add Turnstile token if available
        if (turnstileToken) {
            params.append('cf-turnstile-response', turnstileToken);
        }
        
        return params.toString();
    }
    
    // Helper function to make AJAX requests
    function makeAjaxRequest(url, data, onSuccess, onError, onComplete) {
        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: data
        })
        .then(response => response.json())
        .then(data => {
            if (onSuccess) onSuccess(data);
        })
        .catch(error => {
            console.error('AJAX Error:', error);
            if (onError) onError(error);
        })
        .finally(() => {
            if (onComplete) onComplete();
        });
    }
    
    // Handle newsletter form submission
    document.addEventListener('submit', function(e) {
        if (e.target.classList.contains('newsletter-form')) {
            console.log('Newsletter form submitted - preventing default');
            e.preventDefault();
            
            const form = e.target;
            const modalId = form.dataset.modalId;
            const submitBtn = form.querySelector('button[type="submit"]');
            const messageDiv = form.querySelector('.form-message');
            
            // Check if Turnstile is completed
            if (!turnstileToken) {
                messageDiv.classList.remove('success');
                messageDiv.classList.add('error');
                messageDiv.innerHTML = '<p style="color: red;">Please complete the security verification.</p>';
                messageDiv.style.display = 'block';
                return;
            }
            
            // Disable submit button and show loading
            submitBtn.disabled = true;
            submitBtn.textContent = 'Subscribing...';
            messageDiv.style.display = 'none';
            
            const formData = serializeForm(form) + '&action=subscribe_newsletter';
            
            makeAjaxRequest(
                popupCtaAjax.ajaxUrl,
                formData,
                function(response) {
                    if (response.success) {
                        messageDiv.classList.remove('error');
                        messageDiv.classList.add('success');
                        messageDiv.innerHTML = '<p style="color: green;">' + response.message + '</p>';
                        messageDiv.style.display = 'block';
                        form.reset();
                        
                        // Close modal after 2 seconds
                        setTimeout(function() {
                            closeModal(modalId);
                            messageDiv.style.display = 'none';
                        }, 2000);
                    } else {
                        messageDiv.classList.remove('success');
                        messageDiv.classList.add('error');
                        messageDiv.innerHTML = '<p style="color: red;">' + response.message + '</p>';
                        messageDiv.style.display = 'block';
                    }
                },
                function(error) {
                    messageDiv.classList.remove('success');
                    messageDiv.classList.add('error');
                    messageDiv.innerHTML = '<p style="color: red;">An error occurred. Please try again.</p>';
                    messageDiv.style.display = 'block';
                },
                function() {
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Subscribe';
                }
            );
        }
    });
    
    // Handle download form submission
    document.addEventListener('submit', function(e) {
        if (e.target.classList.contains('download-form')) {
            e.preventDefault();
            
            const form = e.target;
            const modalId = form.dataset.modalId;
            const submitBtn = form.querySelector('button[type="submit"]');
            const messageDiv = form.querySelector('.form-message');
            
            // Check if Turnstile is completed
            if (!turnstileToken) {
                messageDiv.classList.remove('success');
                messageDiv.classList.add('error');
                messageDiv.innerHTML = '<p style="color: red;">Please complete the security verification.</p>';
                messageDiv.style.display = 'block';
                return;
            }
            
            // Disable submit button and show loading
            submitBtn.disabled = true;
            submitBtn.textContent = 'Processing...';
            messageDiv.style.display = 'none';
            
            const formData = serializeForm(form) + '&action=download_guide';
            
            makeAjaxRequest(
                popupCtaAjax.ajaxUrl,
                formData,
                function(response) {
                    if (response.success) {
                        messageDiv.classList.remove('error');
                        messageDiv.classList.add('success');
                        messageDiv.innerHTML = '<p style="color: green;">' + response.message + '</p>';
                        messageDiv.style.display = 'block';
                        
                        // If there's a download URL, trigger download
                        if (response.download_url) {
                            const link = document.createElement('a');
                            link.href = response.download_url;
                            link.download = '';
                            document.body.appendChild(link);
                            link.click();
                            document.body.removeChild(link);
                        }
                        
                        form.reset();
                        
                        // Close modal after 3 seconds
                        setTimeout(function() {
                            closeModal(modalId);
                            messageDiv.style.display = 'none';
                        }, 3000);
                    } else {
                        messageDiv.classList.remove('success');
                        messageDiv.classList.add('error');
                        messageDiv.innerHTML = '<p style="color: red;">' + response.message + '</p>';
                        messageDiv.style.display = 'block';
                    }
                },
                function(error) {
                    messageDiv.classList.remove('success');
                    messageDiv.classList.add('error');
                    messageDiv.innerHTML = '<p style="color: red;">An error occurred. Please try again.</p>';
                    messageDiv.style.display = 'block';
                },
                function() {
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Download Guide';
                }
            );
        }
    });
});
