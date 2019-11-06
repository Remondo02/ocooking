<?php

 class Role_Cooker
 {
     const ROLE_NAME = 'cooker';

     public function add_role()
     {
         add_role(
             self::ROLE_NAME,
             __( 'Cuisinier', OCOOKING_PLUGIN_TEXT_DOMAIN )
         );
     }

     public function add_capabilities()
     {
         $role = get_role( self::ROLE_NAME );

         $role->add_cap( 'read', true );
         $role->add_cap( 'edit_posts', false );
         $role->add_cap( 'delete_posts', false );
         $role->add_cap( 'edit_recipe', true );
         $role->add_cap( 'read_recipe', true );
         $role->add_cap( 'delete_recipe', true );
         $role->add_cap( 'edit_recipes', true );
         $role->add_cap( 'edit_others_recipes', true );
         $role->add_cap( 'publish_recipes', true );
         $role->add_cap( 'read_private_recipes', true );
         $role->add_cap( 'edit_recipes', true );
         $role->add_cap( 'manage_recipe_terms', true );
     }

     public function remove_role()
     {
         remove_role( self::ROLE_NAME );
     }
 }