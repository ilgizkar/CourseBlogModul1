<?php
Class Router
{
    private $route;
    
   
    public function __construct()
    {
        $this->route = $_SERVER['REQUEST_URI'];
      
    }
    
    
    public function goTo()
    {
        
        $routes=[
        "/"=>'homepage.php',
        "/about"=>'about.php',
        "/create"=>'store.php',
        "/show"=>"show.php",
        "/update"=>"update.php",
        "/delete"=>"delete.php",
        "/edit"=>"edit.php"
        ];
        
        
        
        if(array_key_exists($this->route, $routes)) {
            include __DIR__.'/../'.$routes[$this->route];
            exit;
        } else {
            echo '404';
        }
    }
}
?>
