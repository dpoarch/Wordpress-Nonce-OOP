<?php

namespace wpnonce;

class nonce
{

        /**
        * Generates and returns a nonce. The nonce is generated based on the current time, the $action argument, and the current user ID.
        *
        *@param $action :: (string/int) (optional) Action name. Should give the context to what is taking place. Optional but recommended.
        *@return The one use form token.
        */      

        public static function create_nonce($action=-1) {
                return wp_create_nonce($action);
        }

        /**
        * Retrieves or displays the nonce hidden form field.
        *
        *@param $action :: (optional) Should give the context to what is taking place.
        *@param $name   :: (optional) This is the name of the nonce hidden form field to be created.
        *@param $referer:: (optional) Whether also the referer hidden form field should be created with the wp_referer_field() function.
        *@param $echo   :: (optional) Whether to display or return the nonce hidden form field, and also the referer hidden form field if the $referer argument is set to true.
        *@return string The nonce hidden form field, optionally followed by the referer hidden form field if the $referer argument is set to true.
        */

        public static function get_wp_nonce_field($action=-1, $name='_wpnonce', $referer=true, $echo=true) {
                return wp_nonce_field($action, $name, $referer, $echo);
        }

        /**
        * Retrieve URL with nonce added to URL query.
        *
        *@param string $action :: nonce action name
        *@param string $actionurl :: URL to add nonce action
        *@param string $name :: (optional) nonce name
        *@return string URL with nonce added to URL query
        */

        public static function get_wp_nonce_url($actionurl, $action, $name=-1) {
                return wp_nonce_url($actionurl, $action, $name);
        }

        /**
        * Tests either if the current request carries a valid nonce, or if the current request was referred from an administration screen
        *
        *@param $action    :: (optional) Action name. Should give the context to what is taking place.
        *@param $query_arg :: (optional) Where to look for nonce in the $_REQUEST PHP variable.
        *@return   To return boolean true, in the case of the obsolete usage, the current request must be referred from an administration screen; 
        * in the case of the prefered usage, the nonce must be sent and valid. 
        */

        public static function wp_check_admin_referer($action = -1, $query_arg = '_wpnonce') {
                return check_admin_referer( $action, $query_arg );
        }

       /**
       *  verifies the AJAX request, to prevent any processing of requests which are passed in by third-party sites or systems.
       *
       *@param $action    :: (optional) Action nonce.
       *@param $query_arg :: (optional) where to look for nonce in $_REQUEST
       *@param $die       :: (optional) whether to die if the nonce is invalid.
       *@return  (boolean) If parameter $die is set to false, this function will return a boolean of true if the check passes or false if the check fails.
       */

        public static function wp_check_ajax_referer( $action = -1, $query_arg = false, $die = true ) {
    	       	return check_ajax_referer( $action, $queryArg, $die );
    	}	
	
      /**
      * Display's 'Are you sure you want to do this?' message to confirm the action being taken.
      *
      *@param $action :: The nonce action.
      *@return This function does not return a value. 
      */

      public static function wp_nonce_confirm( $action ) {
               wp_nonce_ays( $action );
      }

      /**
      * Verify that a nonce is correct and unexpired with the respect to a specified action.
      *
      *@param $nonce :: Nonce to verify.
      *@param $action:: (optional) Action name. Should give the context to what is taking place and be the same when the nonce was created.
      *@return (boolean/integer) Boolean false if the nonce is invalid. Otherwise, returns an integer with the value of:
      *return 1 – if the nonce has been generated in the past 12 hours or less
      *return 2 – if the nonce was generated between 12 and 24 hours ago.
      */

      public static function wp_verify_nonce_field($nonce, $action=-1) {
              return wp_verify_nonce($nonce, $action);
      }
}

