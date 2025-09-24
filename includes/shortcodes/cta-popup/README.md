# Popup CTA Shortcode System

A comprehensive WordPress shortcode system for creating interactive popup call-to-action forms with MailerLite integration.

## Features

- **Multiple Popup Types**: Contact, Newsletter, and Download forms
- **MailerLite Integration**: Automatic subscription to MailerLite groups
- **AJAX Submission**: No page reloads, smooth user experience
- **Tag-based Grouping**: Automatic group assignment based on post tags
- **Responsive Design**: Works on all devices
- **Customizable Content**: Full control over titles, content, and button text

## Installation

The popup CTA system is automatically loaded when the theme is active. No additional installation required.

## Requirements

- Create an account in mailerlite
- Generate API key: [MailerLite API Integrations](https://dashboard.mailerlite.com/integrations/api)
- Define the API key inside WP admin > Theme Options > Under "MailerLite Settings"

## Main Entry Point

**functions.php**

```
require_once get_template_directory() . '/includes/shortcodes/shortcodes.php';
```

# MailerLite WordPress Integration

This integration connects WordPress with [MailerLite](https://www.mailerlite.com/) to automatically subscribe users to the correct groups when they submit a newsletter form on a blog post.

## How It Works

1. When a user submits a newsletter form from a blog post, we look at the **tags** assigned to that post. You can override this with adding **tags="BOF,MOF"** inside the shortcode
2. We send an API request to MailerLite to check if there are any matching groups.
3. If a group is found, we subscribe the user to that group.  
   If not, we fall back to a default newsletter group.

---

## Example Flow

Suppose a blog post is tagged with **BOF** and **MOF**.

When a user submits the newsletter form on that post, the following happens under the hood:

1. **Fetch matching groups from MailerLite**

   ```bash
   curl --location --globoff 'https://connect.mailerlite.com/api/groups?filter[name]=BOF%2CMOF' \
   --header 'Authorization: Bearer {{TOKEN}}'
   ```

This request asks MailerLite for the groups that match the names BOF and MOF.

2. **Extract the group IDs**

The API will return a JSON response containing the matching groups.
Example response:

```
{
  "data": [
    {
      "id": "165136430872397480",
      "name": "BOF"
    },
    {
      "id": "165136423212549504",
      "name": "MOF"
    }
  ]
}
```
3. **Subscribe the user**
If exact matches are found, we take those group IDs and subscribe the user.
If no matches are found, we skip those groups and just subscribe the user to the general newsletter.

Example Subscription Payload
When a user subscribes, we send the following JSON payload to MailerLite:

```
{
  "email": "doxy@mailinator.com",
  "fields": {
    "name": "Kato Benson"
  },
  "subscribed_at": "2025-09-10 11:26:50",
  "groups": [
    "165136430872397480",
    "165136423212549504"
  ]
}
```


## Shortcode Usage

### Basic Syntax

```
[popup-cta type="TYPE" title="TITLE" content="CONTENT" button_text="BUTTON_TEXT"]
```

### Shortcode Attributes

| Attribute | Type | Default | Description |
|-----------|------|---------|-------------|
| `type` | string | `contact` | Type of popup: `contact`, `newsletter`, or `download` |
| `title` | string | Auto-generated | Modal title text |
| `content` | string | Auto-generated | Modal description text |
| `button_text` | string | Auto-generated | Button text |
| `contact_form_id` | string | `''` | Contact Form 7 form ID (for contact type) |
| `download_file` | string | `''` | File URL for download (for download type) |
| `tags` | string | `''` | Comma-separated MailerLite group names. This will override default post tags |
| `style` | string | `default` | Style variant (currently only `default`) |

## Popup Types

### 1. Contact Popup

Creates a popup with a contact form.

**Default Values:**
- Title: "Ready to Get Started?"
- Content: "Get in touch with our experts and let's discuss your project."
- Button Text: "Contact Us"

**Example:**
```php
[popup-cta type="contact" contact_form_id="123"]
```

**With Custom Content:**
```php
[popup-cta 
    type="contact" 
    title="Let's Talk" 
    content="Ready to start your project? We'd love to hear from you." 
    button_text="Get Quote" 
    contact_form_id="123"]
```

### 2. Newsletter Popup

Creates a newsletter subscription popup with MailerLite integration.

**Default Values:**
- Title: "Stay Updated"
- Content: "Subscribe to our newsletter for the latest insights and updates."
- Button Text: "Subscribe"

**Example:**
```php
[popup-cta type="newsletter"]
```

**With Custom Tags:**
```php
[popup-cta 
    type="newsletter" 
    title="AI Insights" 
    content="Get the latest AI trends and tips delivered to your inbox." 
    button_text="Get AI Updates" 
    tags="ai,technology"]
```

**Using Post Tags (Automatic):**
```php
[popup-cta type="newsletter" title="Stay Updated"]
```
*Note: If no tags are specified, the system automatically uses the current post's tags.*

### 3. Download Popup

Creates a download popup with email collection and optional newsletter subscription.

**Default Values:**
- Title: "Download Guide"
- Content: "Get our comprehensive guide delivered to your inbox."
- Button Text: "Download Now"

**Example:**
```php
[popup-cta 
    type="download" 
    download_file="https://example.com/guide.pdf"]
```

**With Newsletter Subscription:**
```php
[popup-cta 
    type="download" 
    title="Magento Development Guide" 
    content="Download our comprehensive Magento development guide." 
    button_text="Download Guide" 
    download_file="https://example.com/magento-guide.pdf" 
    tags="magento,ecommerce"]
```

## MailerLite Integration

### Setup

1. **Get MailerLite API Key**: From your MailerLite dashboard
2. **Define the API key inside WP admin > Theme Options > Under "MailerLite Settings"**

### Group Management

Create groups inside the mailerlite account: [MailerLite Groups](https://dashboard.mailerlite.com/groups)
We are considering our WP blog tags as groups inside the mailerlite account

### Tag-to-Group Mapping

Tags are automatically converted to MailerLite groups:
- Tag: `ai` → Group: `ai`
- Tag: `magento` → Group: `magento`
- Tag: `ecommerce` → Group: `ecommerce`

## Examples

### Blog Post Integration

**In a blog post about AI:**
```php
[popup-cta type="newsletter" title="AI Weekly Digest" button_text="Subscribe to AI Updates"]
```

**In a Magento tutorial:**
```php
[popup-cta 
    type="download" 
    title="Magento Best Practices Guide" 
    download_file="https://example.com/magento-guide.pdf" 
    tags="magento,development"]
```

### Landing Page Usage

**Contact Form:**
```php
[popup-cta 
    type="contact" 
    title="Ready to Get Started?" 
    content="Let's discuss your project requirements." 
    button_text="Schedule Consultation" 
    contact_form_id="456"]
```

**Newsletter Signup:**
```php
[popup-cta 
    type="newsletter" 
    title="Join 10,000+ Developers" 
    content="Get weekly insights on web development, e-commerce, and AI." 
    button_text="Join Newsletter" 
    tags="development,ai,ecommerce"]
```

### Multiple CTAs on Same Page

```php
<!-- Newsletter signup -->
[popup-cta type="newsletter" title="Stay Updated" tags="general"]

<!-- Download guide -->
[popup-cta type="download" title="Download Guide" download_file="https://example.com/guide.pdf" tags="guide"]

<!-- Contact form -->
[popup-cta type="contact" title="Get in Touch" contact_form_id="123"]
```

## Advanced Usage

### Custom Styling

The popups use the theme's existing modal system. You can customize styles by targeting:

```css
/* Modal container */
.modal.newsletter-subscription { }

/* Form elements */
.newsletter-form { }
.download-form { }
.contact-form { }

/* Messages */
.form-message { }
.form-message.success { }
.form-message.error { }
```

## AJAX Response Format

### Newsletter Subscription
```json
{
    "success": true,
    "subscribed_groups": ["ai", "technology"],
    "user_id": "12345",
    "message": "Successfully subscribed to newsletter!"
}
```

### Download Request
```json
{
    "success": true,
    "subscribed_groups": ["magento", "ecommerce"],
    "user_id": "12345",
    "message": "Successfully subscribed to newsletter!",
    "download_url": "https://example.com/guide.pdf"
}
```

## Error Handling

The system includes comprehensive error handling:

- **Validation**: Email format, required fields
- **MailerLite Errors**: API failures, group creation issues
- **Security**: Nonce verification for all requests
- **User Feedback**: Clear success/error messages

## File Structure

```
includes/shortcodes/cta-popup/
├── index.php                          # Main entry point
├── popup-cta.php                      # Shortcode definition
├── includes/
│   ├── cta-ajax-handlers.php          # AJAX form handlers
│   ├── class-mailerlite.php           # MailerLite API integration
├── partials/
│   ├── popup-cta-newsletter-modal.php # Newsletter modal template
│   ├── popup-cta-download-modal.php   # Download modal template
│   └── popup-cta-contact-modal.php    # Contact modal template
└── assets/
    └── js/
        └── popup-cta-ajax.js          # AJAX JavaScript
```

## Troubleshooting

### Common Issues

1. **Popup not opening**: Check if `openModal()` function is available
2. **AJAX errors**: Verify nonce fields and JavaScript console
3. **MailerLite failures**: Check API key and group names and also check the API key inside WP admin > Theme Options > Under "MailerLite Settings"
4. **Form not submitting**: Ensure required fields are filled

### Debug Mode

Enable WordPress debug mode to see detailed error logs:

```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);
```

## Security

- All forms use WordPress nonces for security
- Input sanitization and validation
- MailerLite API key stored securely
- No direct frontend API calls

## Browser Support

- Modern browsers (Chrome, Firefox, Safari, Edge)
- Mobile responsive
- Graceful degradation for older browsers

## Performance

- Minimal JavaScript footprint
- AJAX requests only when needed
- Cached MailerLite group data
- Optimized for fast loading

## Support

For issues or questions:
1. Check WordPress debug logs
2. Verify MailerLite API key
3. Test with browser developer tools
4. Check console for JavaScript errors

---

**Version**: 1.0.0  
**Last Updated**: January 2025  
**Compatibility**: WordPress 5.0+, PHP 7.4+
