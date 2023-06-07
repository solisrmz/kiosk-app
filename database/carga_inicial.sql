use db_kiosk_local;

insert into idiomas(idioma,modificado_por,created_at) values ('Inglés','carga inicial',now());
insert into idiomas(idioma,modificado_por,created_at) values ('Francés','carga inicial',now());
insert into idiomas(idioma,modificado_por,created_at) values ('Alemán','carga inicial',now());
insert into idiomas(idioma,modificado_por,created_at) values ('Chino mandarín','carga inicial',now());
insert into idiomas(idioma,modificado_por,created_at) values ('Italiano','carga inicial',now());
insert into idiomas(idioma,modificado_por,created_at) values ('Español para extranjeros','carga inicial',now());
insert into idiomas(idioma,modificado_por,created_at) values ('Japonés','carga inicial',now());
commit;

insert into sistemas (sistema, modificado_por, created_at) values ('Escolarizado', 'carga inicial', curdate());
insert into sistemas (sistema, modificado_por, created_at) values ('Sabatino', 'carga inicial', curdate());
commit;

insert into planteles (plantel, modificado_por, created_at) values ('Torre Hakim', 'carga inicial', curdate());
insert into planteles (plantel, modificado_por, created_at) values ('CAXA', 'carga inicial', curdate());
commit;

insert into categorias (categoria, edad_inicial, edad_final, modificado_por, created_at) 
	            values ('Kids', 5, 6, 'carga inicial', curdate());
insert into categorias (categoria, edad_inicial, edad_final, modificado_por, created_at) 
	            values ('Pre children', 7, 8, 'carga inicial', curdate());
insert into categorias (categoria, edad_inicial, edad_final, modificado_por, created_at) 
	            values ('Children', 9, 11, 'carga inicial', curdate());
insert into categorias (categoria, edad_inicial, edad_final, modificado_por, created_at) 
	            values ('Pre teens', 12, 13, 'carga inicial', curdate());
insert into categorias (categoria, edad_inicial, edad_final, modificado_por, created_at) 
	            values ('Teens', 14, 16, 'carga inicial', curdate());                
insert into categorias (categoria, edad_inicial, edad_final, modificado_por, created_at) 
	            values ('Adults', 17, 99, 'carga inicial', curdate());   
commit;