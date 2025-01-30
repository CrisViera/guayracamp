package com.guayracamp.guayracamp.Controllers;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class indexController {

    @GetMapping("/")
    String principal(){
        return "index";
    }

    @GetMapping("/capas/autocaravanas")
    String autocaravanas(){
        return "/autocaravanas";
    }

    @GetMapping("/capas/campers")
    String campers(){
        return "/capas/campers";
    }

    @GetMapping("/tiendas")
    String tiendas(){
        return "/capas/tiendas";
    }

    @GetMapping("/login")
    String login(){
        return "/capas/login";
    }
}
