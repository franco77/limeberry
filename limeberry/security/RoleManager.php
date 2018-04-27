<?php

/**
*	Limeberry Framework
*	
*	a php framework for fast web development.
*	
*	@package Limeberry Framework
*	@author Sinan SALIH
*	@copyright Copyright (C) 2018 Sinan SALIH
*	
**/
namespace limeberry\security
{
	use limeberry\security\RoleProvider;

        /**
         * A basic role mananer class for Limeberry Framework.
         * You can get available roles from database and set them in application register function,
         * to manage user accesses to specific controllers.
         * You can read Limeberry - Tutorials Book for using and examples.
         */
	class RoleManager 
	{


            /**
             * If user is Authorized
             * @return boolean
             */
             public static function isAuthorized()
             {
                      $roles_provided = RoleProvider::get_provided_roles();
                      $required_roles = RoleProvider::get_required_roles();
                     foreach ($required_roles as $key => $value) {
                             $auth_man_id[] = $key;
                     }

                      foreach ($roles_provided as $key => $value) {
                             if(in_array($key, $auth_man_id))
                             {
                                     return true;
                             }else{
                                     return false;
                             }
                      }
             }

             /**
              * Clear required roles.
              */
             public static function ClearRequired()
             {
                     roleprovider::RequiredRoles(null);
             }

	}
}

?>