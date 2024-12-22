package com.guayracamp.guayracamp;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.ComponentScan;

@SpringBootApplication
@ComponentScan("com.guayracamp")
public class GuayracampApplication {

	public static void main(String[] args) {
		SpringApplication.run(GuayracampApplication.class, args);
	}

}
