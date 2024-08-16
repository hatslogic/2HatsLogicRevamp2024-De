<?php 
//Hubspot API custom script
// const HUBSPOT_ACCESS_TOCKEN = 'pat-na1-9151e548-5567-4d9e-bcab-b4a33caf9643';
// const HUBSPOT_OWNER_ID = '163500643';
// const HUBSPOT_DEFAULT_STAGE = 'appointmentscheduled';

const HUBSPOT_ACCESS_TOCKEN = 'pat-na1-9ddc7ae4-35cb-440f-b2e4-4a5479d07cdd';
const HUBSPOT_OWNER_ID = '188327473';
const HUBSPOT_DEFAULT_STAGE = 'appointmentscheduled';

add_action( 'gform_after_submission', 'hubspot_callback_api', 10, 2 );

function hubspot_callback_api( $entry, $form ) {
    $formData = [];
    foreach ( $form['fields'] as $field ) {
        //$inputs = $field->get_entry_inputs();
        $value = rgar( $entry, (string) $field->id );
        $formData[$field->id] = $value; 
    }

    create_hubspot_deal($formData);    
    
}

function get_contacts_by_email($email){
    $ch = curl_init();
    $headers = array(
        'Accept: application/json',
        'Content-Type: application/json',
        "Authorization: Bearer ".HUBSPOT_ACCESS_TOCKEN
    
    );
    curl_setopt($ch, CURLOPT_URL, 'https://api.hubapi.com/contacts/v1/contact/email/'.$email.'/profile');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = json_decode(curl_exec($ch));
    curl_close($ch);
    
    if(isset($result->status) && $result->status == 'error'){
        return false;
    }
    return $result->vid;
}

function get_companies_by_domain($url){

    $domain = parse_url($url, PHP_URL_HOST);

    $ch = curl_init();
    $headers = array(
        'Accept: application/json',
        'Content-Type: application/json',
        "Authorization: Bearer ".HUBSPOT_ACCESS_TOCKEN
    
    );
    $payload = [
        "limit" => "1",
        "requestOptions" => [
            "properties" => [
                "domain",
                "createdate",
                "name",
            ]
        ],
        "offset" => [
            "isPrimary" => true,
            "companyId" => 0
        ]

        ];
    $data_string = json_encode($payload);
    curl_setopt($ch, CURLOPT_URL, 'https://api.hubapi.com/companies/v2/domains/'.$domain.'/companies');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = json_decode(curl_exec($ch));
    
    curl_close($ch);

    if(empty($result->results)){
        return false;
    }
    
    return $result->results[0]->companyId;
}

function create_hubspot_contact($data){
    
    $ch = curl_init();
    $headers = array(
        'Accept: application/json',
        'Content-Type: application/json',
        "Authorization: Bearer ".HUBSPOT_ACCESS_TOCKEN
    
    );
    foreach($data as $property => $value){
        $payloadArray[] = ["property" => $property,"value" => $value];
    }
    $payloadArray[] = ["property" => "hs_latest_source","value" => "ORGANIC_SEARCH"];
    //$payloadArray[] = ["property" => "hs_latest_source_data_1","value" => "BLVR contact"]; 
    //$payloadArray[] = ["property" => "hs_latest_source_data_2","value" => "Google"]; 

    $payload['properties'] = $payloadArray;
    $data_string = json_encode($payload);
    $ch=curl_init('https://api.hubapi.com/contacts/v1/contact');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $result = json_decode(curl_exec($ch));
    curl_close($ch);

    
    if(isset($result->status) && $result->status == 'error'){
        print_r($result);exit;
    }
    
    return $result->vid;
}

function create_hubspot_company($data){
    
    $ch = curl_init();
    $headers = array(
        'Accept: application/json',
        'Content-Type: application/json',
        "Authorization: Bearer ".HUBSPOT_ACCESS_TOCKEN
    
    );
    
    $domain = '';
    
    if($data['website'] != '' && filter_var($data['website'], FILTER_VALIDATE_URL) !== FALSE){
        $domain = parse_url($data['website'], PHP_URL_HOST);
    }

    $payloadArray= [
        ["name" => 'name',"value" => $data['company']],
        ["name" => 'domain',"value" => $domain]
    ];
    $payload['properties'] = $payloadArray;
    $data_string = json_encode($payload);
    $ch=curl_init('https://api.hubapi.com/companies/v2/companies');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $result = json_decode(curl_exec($ch));
    curl_close($ch);
    
    if(isset($result->status) && $result->status == 'error'){
        return false;
    }
    
    return $result->companyId;
}

function create_hubspot_deal($data){

    //hubspot_logs($data);
    
    $dataArray = [
        "company" => $data[3],
        "email" => $data[4],
        "firstname" => $data[1],
        "website" => $data[5],
        "message" => $data[6]
    ];

    $contactId = get_contacts_by_email($data[4]);
    
    if(!$contactId){
        
        $contactId = create_hubspot_contact($dataArray);
    }
    
    $companyId = false;

    if( $data[5] != '' && filter_var($data[5], FILTER_VALIDATE_URL) !== FALSE ){
        $companyId = get_companies_by_domain($data[5]);
    }
    
    if(!$companyId){
        $companyId = create_hubspot_company($dataArray);
    }

    $ch = curl_init();
    $headers = array(
        'Accept: application/json',
        'Content-Type: application/json',
        "Authorization: Bearer ".HUBSPOT_ACCESS_TOCKEN
    
    );

    $payloadArray= [
        ["name" => 'dealname',"value" => $dataArray['company']],
        ["name" => 'description',"value" => $dataArray['message']],
        ["name" => 'hubspot_owner_id',"value" => HUBSPOT_OWNER_ID],
        ["name" => 'dealstage',"value" => HUBSPOT_DEFAULT_STAGE],
    ];

    $associationsArray = [
        'associatedCompanyIds' => [
            $companyId
        ],
        "associatedVids" => [
            $contactId
        ]
    ];
    $payload['associations'] = $associationsArray;
    $payload['properties'] = $payloadArray;
    $data_string = json_encode($payload);
    
    $ch=curl_init('https://api.hubapi.com/deals/v1/deal');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $result = json_decode(curl_exec($ch));
    curl_close($ch);


    return $result;
}

function hubspot_logs($message) { 
    if(is_array($message)) { 
        $message = json_encode($message); 
    } 
    $file = fopen("../hubspot_logs.log","a"); 
    echo fwrite($file, "\n" . date('Y-m-d h:i:s') . " :: " . $message); 
    fclose($file); 
}