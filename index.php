<?php 
    require_once "_inc/config.php";
    
    // echo "<pre>";
    // print_r( $_SERVER );
    // echo "</pre>";
    
   $routes = [

        // HOMEPAGE
        '/' => [
            'GET' => 'home.php'
        ], 

        // TAG
        '/tag' => [
                'GET' => 'tag.php'              // show posts for tag
            ],

        // POST
        '/post' => [
                'GET' =>'post.php',             // show post
                'POST' => '_admin/post-add.php'   // add new post
        ],

        // EDIT
        '/edit' => [
                'GET' =>'edit.php',             // edit form
                'POST' => '_admin/post-edit.php'   // store new values
        ],
        
        // DELETE
        '/delete' => [
                'GET' =>'delete.php',             // delete form
                'POST' => '_admin/post-delete.php'  // make the delete
        ],
   ];
    

    $page = segment(1);
    $method = $_SERVER['REQUEST_METHOD'];

    if( ! isset( $routes["/$page"][$method] ) )
    {
        show_404();
    }

    require $routes["/$page"][$method];
    
