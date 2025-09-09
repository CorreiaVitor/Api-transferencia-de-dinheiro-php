<?php

use App\Http\Routes;

Routes::get("/", "HomeController:home");
Routes::get("/users/fetch", "UserController:fetch");
Routes::post("/users/create", "UserController:store");
Routes::put("/users/update", "UserController:update");
Routes::delete("/users/delete", "UserController:remove");

?>