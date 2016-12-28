<?php
function fbAppId(){
    return "1653365274883779";
}


function fbVersion(){
    return "v2.4";
}


//function to count the number of words in a string
/**
 * 
 * @param type $string
 * @return type
 */
function wordCount($string){
    $a = explode(" ", $string);
    
    return count($a);
}


/**
 * 
 * @param type $phoneNumber
 * @return string
 */
function is_phone_number($phoneNumber){
    if (preg_match("/^[0-9]*$/", $phoneNumber)) {
        return $phoneNumber;
    } 

    else {
        return ""; // return empty string
    }
}

// to ensure input is a real name i.e. only alphabets are allowed
/**
 * 
 * @param type $name
 * @return string
 */
function is_real_name($name)
{
    $name = stripslashes(trim($name));
    $name = strip_tags($name);
    $name = htmlentities($name);
    
    if (preg_match("/^[a-zA-Z ]*$/", $name)) {
        return $name;
    } 

    else {
        return ""; // return empty string
    }
}

// to ensure only integer is allowed
/**
 * Used to ensure $value is an integer
 * @param type $value
 * @return int or empty string on failure
 */
function only_int($value)
{
    if (preg_match("/^[0-9]*$/", $value)) {
        return $value;
    } 

    else {
        return FALSE; // return empty string
    }
}

// to ensure input is in email format
/**
 * Checks whether string is a well-formatted email
 * @param String $email The string to be checked
 * @return string
 */
function is_email($email)
{
    $email = stripslashes(trim($email));
    $email = strip_tags($email);
    $email = htmlentities($email);
    
    $email = filter_var($email, FILTER_SANITIZE_EMAIL); // sanitize email
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = strtolower($email); // change case to lower
        return $email;
    } 

    else {
        return ""; // return empty string if error encountered
    }
}


// to allow only numbers, alphabets, underscore and fullstop. This is suitable for username
/**
 * 
 * @param type $name
 * @return string
 */
function is_username($name)
{
    $name = stripslashes(trim($name));
    $name = htmlentities($name);
    
    if (preg_match("/^[a-zA-Z 0-9_.]*$/", $name)) {
        return $name;
    } 

    else {
        return ""; // return empty string
    }
}

// to encrypt password
/**
 * 
 * @param type $pword
 * @return type
 */
function hash_pass($pword)
{
    $salt1 = "*&!mm3v6*_";
    $salt2 = "ki3fr+_@";
    
    $new_pword = hash('ripemd128', "$salt1$pword$salt2");
    
    return $new_pword;
}

// to check if url is valid
/**
 * 
 * @param type $url
 * @return string
 */
function is_url($url)
{
    $url = filter_var($url, FILTER_SANITIZE_URL); // sanitize url
    
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        return $url;
    } 

    else {
        return "";
    }
}


/**
 * 
 * @param type $errorCode
 * @return string
 */
function getFileError($errorCode)
{
    if ($errorCode > 0) { // if error code is greater than 0
        
        switch ($errorCode) {
            case 1:
                $msg = "Exceeds upload_max_file in php.ini";
                break;
            
            case 2:
                $msg = "Exceeds max_file_size in html";
                break;
            
            case 3:
                $msg = "partially uploaded";
                break;
            
            case 4:
                $msg = "no file uploaded";
                break;
            
            case 6:
                $msg = "no temp folder";
                break;
            
            case 7:
                $msg = "unable to write to disk";
                break;
            
            case 8:
                $msg = "file upload stopped";
                break;
        }
        
        return $msg;
    }
}


/**
 * 
 * @param type $valueToFilter
 * @return string
 */
function spam_filter($valueToFilter){
    $unallowed = [
        'to:',
        'cc:',
        'bcc:',
        'content-type:',
        'mime-version:',
        'multipart-mixed:',
        'content-transfer-encoding:'
    ];
    
    // loop through the array to check if any value in the array is found in the $value sent by caller
    foreach ($unallowed as $spam) {
        if (stripos($valueToFilter, $spam) !== FALSE) { // false will be returned if $spam is not found in $valueToFilter. stripos() is case-insensitive
            return ""; // return an emoty string is $spam is found in $valueToFilter. This will break out of the spam_filter()
        }
    }
    
    // if no spam is found, replace any occurence of \r, \n, %0a, %0d with a space and return trimmed version of $valueToFilter
    str_replace(array(
        "\r",
        "\n",
        "%0a",
        "%0d"
    ), ' ', $valueToFilter);
    return trim($valueToFilter);
}


//to be used as naming convention for team and task names
/**
 * 
 * @param type $name
 * @return string
 */
function allowedName($name){
    $name = stripslashes(trim($name));
    $name = htmlspecialchars($name);
    $name = strip_tags($name);
    
    if (preg_match("/^[a-zA-Z 0-9._-]*$/", $name)) {
        return $name;
    } 

    else {
        return ""; // return empty string
    }
}



/**
 * @description function to generate random string with an underscore in between
 * @param string $codeType string to pass as 2nd param to random_string() e.g. alnum, numeric
 * @param int $minLength minimum length of string to generate
 * @param int $maxLength maximum length of string to generate
 * @param string $delimiter [optional] The string to put in between the first and second strings Default is underscore
 * @return string $code the new randomly generated code
 */
function generateRandomCode($codeType, $minLength, $maxLength, $delimiter = "_"){
    $totLength = rand($minLength, $maxLength-1);
    
    $b4_ = rand(1, $totLength-1);//number of strings before the underscore
    $afta_ = $totLength - $b4_;//number of strings after the underscore
    
    $code = random_string($codeType, $b4_) . $delimiter . random_string($codeType, $afta_);
    
    return $code;
}


/**
 * @description creates dir for new users and copy an index file to the subdir to prevent illegal access to them from the url
 * @param string $userCode the code of the new user to create the directories for
 */
function mkdirAndCopyFiles($userCode){
    //make dir for user creating a folder to hold all user's files
    mkdir("../smartfiles/users/$userCode/profile_pics", 0755, TRUE);//profile pictures folder
    mkdir("../smartfiles/users/$userCode/pc", 0755, TRUE);//files shared in a personal chat
    mkdir("../smartfiles/users/$userCode/conf", 0755, TRUE);//files share in a video call/conference


    //copy an index html file to directories to prevent access to the the folder contents from URL
    
    copy("../smartfiles/users/index.html", "../smartfiles/users/$userCode/index.html");
    copy("../smartfiles/users/index.html", "../smartfiles/users/$userCode/profile_pics/index.html");
    copy("../smartfiles/users/index.html", "../smartfiles/users/$userCode/pc/index.html");
    copy("../smartfiles/users/index.html", "../smartfiles/users/$userCode/conf/index.html");
}


/**
 * Array of file extensions regarded to be a document.
 * Used in separating file types inserted into the column 'type' of files table
 * Used in Task/fileUpload (at least)
 * @return array
 */
function docArray(){
    return ['.doc', '.docx', '.pdf', '.xls', '.ppt', '.pptx', '.csv', '.xlsx', '.dot', '.docm', '.dotx', '.dotm', '.docb',
        '.xlt', '.xlm', '.xlsm', '.xltx', '.xltm', '.xlsb', '.xla', '.xlam', '.xll', '.xlw', '.pot', '.pps', '.pptm', '.potx',
        '.potm', '.ppam', '.ppsx', '.ppsm', '.sldx', '.sldm', '.pub', '.odt', '.fb2', '.ps', '.wpd', '.wp', '.wp7', '.accdb',
        '.accde', '.accdt', '.accdr', '.xps'];
}


/**
 * Array of url endings (e.g. '.com')
 * Used in getting url from a string that looks like a url but doesn't start with a protocol or 'www'
 * @return array
 */
function urlArray(){
    return ['uk', 'za', 'com', 'net', 'name', 'ng', 'edu', 'ca', 'org', 'edu'];
}



/**
 * Creates link to unsubscribe from a notification email
 * @param type $userEmail
 * @param type $userId
 * @param type $userCode
 * @param type $subsciptionType
 * @return string
 */

function unsubscribeLink($userEmail, $userId, $userCode, $subsciptionType){
   $rand = generateRandomCode(20, 30);
   $random = generateRandomCode(30, 40, "");


   //replace the "@" in email so as to be able to safely PASS it in URL
   $urlEmail = str_replace(['@', '.'], ['at', 'dot'], $userEmail);


   $unsubscribeLink = base_url()."subscription/unsubscribe/$random/$userCode/$subsciptionType/$urlEmail/$userId/$rand";

   return $unsubscribeLink;
}


function igcEmail(){
    return "ibadangolfclub@gmail.com";
}