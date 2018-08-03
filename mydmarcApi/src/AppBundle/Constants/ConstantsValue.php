<?php
namespace AppBundle\Constants;

/**
 * This class used to handle constants in the application
 * @author Binsha MB 
 * @version v1
 * created on : 26/07/2018
*/

class ConstantsValue {

    // Invalid API Key message

    const API_KEY_INVALID	=	'auth_token is Invalid';
    
    const MAX_REQUEST_LENGTH =	30000000;

    //message to show when invalid request method 

	const 	REQUEST_METHOD_ERROR = 'Invalid request method';

	//message to show when unsupported content type request

	const CONTENT_TYPE_ERROR 	= 'Unsupported Media Type';

	//message to show when request size exceeds the limit
	const PAYLOAD_ERROR 		= 'Request size exceeded the  limit';

	//Maximum payload length

   
	const INVALID_LOGIN 	 =	'Invalid login details';
	
	const ALLOWED_REQUEST_METHOD 	=  array('GET','POST','PUT');

    

}
?>