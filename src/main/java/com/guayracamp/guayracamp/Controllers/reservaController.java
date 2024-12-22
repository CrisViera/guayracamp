package com.guayracamp.guayracamp.Controllers;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

@Controller
public class reservaController {
    
    @GetMapping("reserva")
    String reserva(){
        return "/reserva";
    }
    
    // Manejo del formulario de reserva
    @PostMapping("formularioReserva")
    public String formularioReserva() {
    	return "/reservaConfirmada";
    }
}
