package com.guayracamp.guayracamp.Controllers;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class reservaController {
    
    @GetMapping("reserva")
    String reserva(){
        return "/reserva";
    }
}
