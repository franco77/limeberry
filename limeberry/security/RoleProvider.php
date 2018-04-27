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
    /**
     * This class is used to provide roles from database and set them in application register function.
     * Role Manager class will access available roles and manage controller or Action permissions.
     */
	class RoleProvider
	{

            private static $all_roles=array();
            private static $required_roles = array();
            private static $provided_roles = array();

            /**
             * This function is used to fill roles with id and value from database.
             * This is necessary for using role manager class.
             * @param Array $rolelist Set all roles to role provider class. Array key is id in database and value is a named provision of role
             */
            public static function FillRoles($rolelist)
            {
                    self::$all_roles = $rolelist;
            }

            /**
             * This function is used to set required roles for controller or controller action. If you want to affect
             * a whole controller with set role you must setup role manager in construct method.
             * @param Array $rolelist Required roles for a action in a controller or in whole controller.
             */
            public static function RequiredRoles($rolelist)
            {
                    self::$required_roles = $rolelist;
            }

            public static function ProvidedRoles($rolelist)
            {
                    self::$provided_roles = $rolelist;
            }



            /**
             *  Return all roles in array
             * @return Array
             */
            public static function get_all_roles()
            {
                    return self::$all_roles;
            }
            /**
             * Get Provided roles in array.
             * @return Array
             */
            public static function get_provided_roles()
            {
                    return self::$provided_roles;
            }
            /**
             * Returns required roles for controller or action.
             * @return Array
             */
            public static function get_required_roles()
            {
                    return self::$required_roles;
            }
  	}
}


?>