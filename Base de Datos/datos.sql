USE guidetourist;

INSERT INTO categoria(nombreCategoria) VALUES ("Resumen");
INSERT INTO categoria(nombreCategoria) VALUES ("Historia");
INSERT INTO categoria(nombreCategoria) VALUES ("Ubicacion");
INSERT INTO categoria(nombreCategoria) VALUES ("Latitud");
INSERT INTO categoria(nombreCategoria) VALUES ("Longitud");

INSERT INTO lugar (nombre) VALUES ("Catedral Basílica de Arequipa");

INSERT INTO lugar_has_categoria(Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (1,1,"La plaza Mayor o plaza de Armas de Arequipa, es uno de los principales espacios públicos de Arequipa y el lugar de fundación de la ciudad. Está ubicada en el Centro Histórico de Arequipa, a su alrededor esta La Catedral de Arequipa en el norte , los Portales de Arequipa al este, sur y oeste, La Iglesia La Compañía al sur-este, La Iglesia Nuestra señora de la Merced al sur-oeste y en el centro de la plaza una pileta de bronce.","https://es.wikipedia.org/wiki/Plaza_de_Armas_de_Arequipa");
INSERT INTO lugar_has_categoria(Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (1,2,"Cuando se fundó la ciudad el 15 de agosto de 1540 por García Manuel de Carvajal en el valle del río Chili como Villa de la Asunción de Nuestra Señora del Valle Hermoso de Arequipala la ciudad empezó a construirse con ella la plaza mayor.","https://es.wikipedia.org/wiki/Plaza_de_Armas_de_Arequipa");
INSERT INTO lugar_has_categoria(Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (1,3,"Arequipa, Perú","https://es.wikipedia.org/wiki/Plaza_de_Armas_de_Arequipa");
INSERT INTO lugar_has_categoria(Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (1,4,"-16.3989","https://www.distanciasentre.com/pe/plaza-de-armas-en-arequipa-latitud-longitud-plaza-de-armas-en-arequipa-latitud-plaza-de-armas-en-are/LatitudLongitudHistoria/251399.aspx");
INSERT INTO lugar_has_categoria(Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (1,5,"-71.537","https://www.distanciasentre.com/pe/plaza-de-armas-en-arequipa-latitud-longitud-plaza-de-armas-en-arequipa-latitud-plaza-de-armas-en-are/LatitudLongitudHistoria/251399.aspx");



INSERT INTO lugar(nombre) VALUES ("Machu Picchu");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (2,1,"Machu Picchu (Machu Pikchu AFI: [ˌmɑtʃu ˈpiktʃu] en quechua, «Montaña Vieja») es el nombre contemporáneo que se da a una llaqta —antiguo poblado andino— incaica construida antes del siglo XV en el promontorio rocoso que une las montañas Machu Picchu, Putucusi y Huayna Picchu en la vertiente oriental de la cordillera Central, al sur del Perú y a 2490 msnm, altitud de su plaza principal. Su nombre original habría sido Llaqtapata.","https://es.wikipedia.org/wiki/Machu_Picchu");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (2,2,"Los arqueólogos estiman que fue construido durante el siglo XV de nuestra era por los Incas, pero su función sigue siendo un misterio. Se sabe también que fue poblado por un gran número de habitantes, pero sólo por nobles, sacerdotes y las aqllas (vírgenes del sol). Había también una población de campesinos que trabajaba los campos pero no vivían dentro de la ciudadela.","https://www.machupicchu.biz/historia-de-machu-picchu");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (2,3,"Cusco, Peru","https://es.wikipedia.org/wiki/Machu_Picchu");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (2,4,"-13.1636","https://www.distanciasentre.com/pe/machu-picchu-peru-latitud-longitud-machu-picchu-peru-latitud-machu-picchu-peru-longitud/LatitudLongitudHistoria/148719.aspx");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (2,5,"-72.5459","https://www.distanciasentre.com/pe/machu-picchu-peru-latitud-longitud-machu-picchu-peru-latitud-machu-picchu-peru-longitud/LatitudLongitudHistoria/148719.aspx");



INSERT INTO lugar (nombre) VALUES ("Torre Eiffel");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (3,1,"La torre Eiffel (tour Eiffel, en francés), inicialmente nombrada tour de 300 mètres (torre de 300 metros), es una estructura de hierro pudelado diseñada por los ingenieros Maurice Koechlin y Émile Nouguier, dotada de su aspecto definitivo por el arquitecto Stephen Sauvestre y construida por el ingeniero francés Alexandre Gustave Eiffel y sus colaboradores para la Exposición Universal de 1889 en París.","https://es.wikipedia.org/wiki/Torre_Eiffel");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (3,2,"La Torre Eiffel es una estructura diseñada por el ingeniero francés Alexandre-Gustáve Eiffel con motivo de la Exposición Universal de 1889 en París, organizada para conmemorar el centenario de la Revolución Francesa.","http://torreeiffel.info/historia.html");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (3,3,"París, Francia","https://es.wikipedia.org/wiki/Torre_Eiffel");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (3,4,"48.8583701","https://www.123coordenadas.com/coordinates/107785-paris-torre-eiffel");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (3,5,"2.2944813","https://www.123coordenadas.com/coordinates/107785-paris-torre-eiffel");



INSERT INTO lugar (nombre) VALUES ("Coliseo Romano");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (4,1,"El Coliseo o Anfiteatro Flavio es un anfiteatro de la época del Imperio romano, construido en el siglo I y ubicado en el centro de la ciudad de Roma. Su denominación original, Anfiteatro Flavio, hace referencia a la dinastía Flavia de emperadores que lo construyó; su nombre posterior, Coliseo, y por el que es más conocido en la actualidad, se debe a una gran estatua que había cerca, el Coloso de Nerón, que no ha llegado hasta nosotros. Por su conservación e historia, el Coliseo es uno de los monumentos más famosos de la Antigüedad clásica. Fue declarado Patrimonio de la Humanidad en 1980 por la Unesco y una de Las Nuevas Siete Maravillas del Mundo Moderno el 7 de julio de 2007.","https://es.wikipedia.org/wiki/Coliseo");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (4,2,"En 29 a. C. el cónsul romano Estatilio Tauro construyó un anfiteatro en el Campo de Marte, el primero de gran tamaño de la ciudad, con todas las instalaciones necesarias. Este edificio quedó destruido en el Gran incendio de Roma del año 64, surgiendo la necesidad de un nuevo anfiteatro para la urbe romana.","https://es.wikipedia.org/wiki/Coliseo#Historia");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (4,3,"Roma, Italia","https://www.123coordenadas.com/coordinates/114091-coliseo-romano");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (4,4,"41.8902102","https://www.123coordenadas.com/coordinates/114091-coliseo-romano");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (4,5,"12.4922309","https://www.123coordenadas.com/coordinates/114091-coliseo-romano");



INSERT INTO lugar (nombre) VALUES ("Basilica de San Pedro");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (5,1,"La basílica papal de San Pedro (en latín, Basilica Sancti Petri; en italiano, Basilica Papale di San Pietro in Vaticano), conocida comúnmente como basílica de San Pedro, es un templo católico situado en la Ciudad del Vaticano.","https://es.wikipedia.org/wiki/Bas%C3%ADlica_de_San_Pedro");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (5,2,"Después de la crucifixión de Jesús, en el segundo cuarto del siglo I, se registra en el libro bíblico de los Hechos de los Apóstoles que uno de sus doce discípulos, Simón Pedro, un pescador de Galilea, ocupa una posición de liderazgo entre sus seguidores, teniendo gran importancia en la fundación de la Iglesia cristiana.","https://es.wikipedia.org/wiki/Bas%C3%ADlica_de_San_Pedro#Historia");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (5,3,"Plaza de San Pedro, Ciudad del Vaticano","https://es.wikipedia.org/wiki/Bas%C3%ADlica_de_San_Pedro");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (5,4,"41.9022500","http://www.antipodas.net/coordenadaspais/ciudad-del-vaticano/piazza-di-san-pietro.php");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (5,5,"12.4572600","http://www.antipodas.net/coordenadaspais/ciudad-del-vaticano/piazza-di-san-pietro.php");



INSERT INTO lugar (nombre) VALUES ("Lago Titicaca");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (6,1,"El lago Titicaca es el lago navegable más alto del mundo, ubicado en el altiplano andino en los Andes centrales, dentro de la meseta del Collao, a una altitud media de 3812 m s. n. m. entre los territorios de Bolivia y Perú. Posee un área de 8562 km² de los cuales el 56 % (4772 km²) corresponden a Perú y el 44 % (3790 km²) a Bolivia y 1125 km de costa;2​ su profundidad máxima se estima en 281 m y se calcula su profundidad media en 107 m. Su nivel es irregular y aumenta durante el verano austral","https://es.wikipedia.org/wiki/Titicaca");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (6,2,"Una de las culturas más importantes que se asentó en las riberas del lago Titicaca fue la cultura Chiripa, de la cual quedan importantes restos arqueológicos en la zona sur del lago. De igual manera, al norte del lago la cultura Pucará se desarrolló con similitudes importantes. Ambas culturas concibieron el cultivo en camellones (o waru warus), que consistía en elevaciones de tierra rodeadas de agua que protegían a los cultivos de las heladas propias de la zona. Se cree que en los alrededores del lago Titicaca se inició la domesticación de algunos tubérculos y de los camélidos sudamericanos (alpaca y llama).
Hacia el año 200 d. C. la época urbana de la Cultura Tiahuanacota dominó el lago Titicaca construyendo importantes centros ceremoniales en las islas y alrededor del lago.","https://es.wikipedia.org/wiki/Titicaca#Historia_de_la_relaci%C3%B3n_entre_el_lago_y_el_ser_humano");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (6,3,"Peru, Bolivia","https://es.wikipedia.org/wiki/Titicaca");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (6,4,"-12.0682","https://www.distanciasentre.com/lago-titicaca-latitud-longitud-lago-titicaca-latitud-lago-titicaca-longitud/LatitudLongitudHistoria/118043.aspx");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (6,5,"-77.1172","https://www.distanciasentre.com/lago-titicaca-latitud-longitud-lago-titicaca-latitud-lago-titicaca-longitud/LatitudLongitudHistoria/118043.aspx");



INSERT INTO lugar (nombre) VALUES ("Lineas de Nazca");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (7,1,"Las líneas de Nazca son antiguos geoglifos1​ que se encuentran en las pampas de Jumana, en el desierto de Nazca, entre las poblaciones de Nazca y Palpa, en el departamento de Ica (Perú). Fueron trazadas por la cultura nazca y están compuestas por varios cientos de figuras que abarcan desde diseños tan simples como líneas hasta complejas figuras zoomorfas, fitomorfas y geométricas que aparecen trazadas sobre la superficie terrestre. Desde 1994, el Comité de la Unesco ha inscrito Las líneas y geoglifos de Nazca y de Pampas de Jumana como Patrimonio de la Humanidad.2​ Sin embargo, en los últimos años han sufrido graves daños por la construcción de la carretera panamericana y las rodadas de todoterrenos.","https://es.wikipedia.org/wiki/L%C3%ADneas_de_Nazca");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (7,2,"La cultura nazca, con semejantes coordenadas de desarrollo que la de Paracas que había florecido entre los años 700 a. C. y 200 d. C., abarca un marco temporal entre los años 100 d. C. y 600 d. C.3​","https://es.wikipedia.org/wiki/L%C3%ADneas_de_Nazca#Descripci%C3%B3n");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (7,3,"Ica, Peru","https://es.wikipedia.org/wiki/L%C3%ADneas_de_Nazca");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (7,4,"-14.739","https://www.distanciasentre.com/pe/lineas-de-nazca-latitud-longitud-lineas-de-nazca-latitud-lineas-de-nazca-longitud/LatitudLongitudHistoria/16283.aspx");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (7,5,"-75.13","https://www.distanciasentre.com/pe/lineas-de-nazca-latitud-longitud-lineas-de-nazca-latitud-lineas-de-nazca-longitud/LatitudLongitudHistoria/16283.aspx");



INSERT INTO lugar (nombre) VALUES ("Saksaywaman");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (8,1,"Sacsayhuamán (en quechua Saqsaywaman, de saqsay, lugar de saciarse, y waman, halcón, es decir, Lugar donde se sacia el halcón) es una fortaleza ceremonial inca ubicada dos kilómetros al norte de la ciudad del Cuzco. Se comenzó a construir durante el gobierno de Pachacútec, en el siglo XV; sin embargo, fue Huayna Cápac quien la culminó en el siglo XVI.","https://es.wikipedia.org/wiki/Sacsayhuam%C3%A1n");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (8,2,"La zona donde se encuentra esta construcción corresponde a la cabeza del animal sagrado, y una de las traducciones que tiene esta palabra es, precisamente, cabeza de puma. Pachacútec Inca Yupanqui, el noveno Inca, rediseñó la ciudad y le dio forma de puma acostado (el puma es el guardián de las cosas terrenas)","https://es.wikipedia.org/wiki/Sacsayhuam%C3%A1n#Arquitectura");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (8,3,"Cuzco, Peru","https://es.wikipedia.org/wiki/Sacsayhuam%C3%A1n#Arquitectura");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (8,4,"-13.5098","https://www.distanciasentre.com/pe/sacsayhuaman-latitud-longitud-sacsayhuaman-latitud-sacsayhuaman-longitud/LatitudLongitudHistoria/75480.aspx");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (8,5,"-71.9817","https://www.distanciasentre.com/pe/sacsayhuaman-latitud-longitud-sacsayhuaman-latitud-sacsayhuaman-longitud/LatitudLongitudHistoria/75480.aspx");



INSERT INTO lugar (nombre) VALUES ("Ollantaytambo");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (9,1,"Ollantaytambo (quechua: Ollantay Tampu) es un poblado y sitio arqueológico incaico, capital del distrito de Ollantaytambo (provincia de Urubamba), situado al sur del Perú, a unos 90 km al noroeste de la ciudad del Cuzco.","https://es.wikipedia.org/wiki/Ollantaytambo");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (9,2,"Sus callejuelas empedradas y serpenteantes, las ruinas diseminadas por doquier y sus terrazas agrícolas son atractivos que destacan por sí mismos y el visitante lo puede apreciar en todo su esplendor. Entre las ruinas, es recomendable la visita a la antigua fortaleza y al templo, donde podemos apreciar magníficas vistas del Valle Sagrado de los Incas.","https://es.wikipedia.org/wiki/Ollantaytambo#Descripci%C3%B3n");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (9,3,"Ollantaytambo está ubicado al margen del río Patakancha, cerca del punto donde confluye con el río Urubamba. Se encuentra en el distrito del mismo nombre, provincia de Urubamba, aproximadamente a 60 km al noroeste de la ciudad del Cuzco y tiene una altura de 2.792 metros sobre el nivel del mar.","https://es.wikipedia.org/wiki/Ollantaytambo#Ubicaci%C3%B3n");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (9,4,"-13.2572200","http://dateandtime.info/es/citycoordinates.php?id=3934055");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (9,5,"-72.2630600","http://dateandtime.info/es/citycoordinates.php?id=3934055");



INSERT INTO lugar (nombre) VALUES ("Moray");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (10,1,"Este sitio se encuentra cerca del Cusco, en el Perú. A primera vista pareciera una especie de anfiteatro, conformado de varios andenes circulares, situado a 3.500 msnm.","https://es.wikipedia.org/wiki/Moray_(sitio_arqueol%C3%B3gico)");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (10,2,"Fue reconocido en 1932 por la expedición de Shirppe Johnson, andenes a manera de anillos concéntricos. Cada círculo comprende una terraza que se superpone a otra, formando círculos que van ampliándose. Se puede acceder de uno a otro escalando piedras salientes (sarunas), enclavadas en la pared.","https://es.wikipedia.org/wiki/Moray_(sitio_arqueol%C3%B3gico)#Historia");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (10,3,"Los restos arqueológicos de Moray se encuentran ubicados a 7 kilómetros de Maras, en el Valle Sagrado de los Incas, a 38 km al noroeste del Cuzco, Peru.","https://es.wikipedia.org/wiki/Moray_(sitio_arqueol%C3%B3gico)#Ubicaci%C3%B3n");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (10,4,"-13.3299","https://www.distanciasentre.com/pe/moray-latitud-longitud-moray-latitud-moray-longitud/LatitudLongitudHistoria/149196.aspx");
INSERT INTO lugar_has_categoria (Lugar_idLugar,Categoria_idCategoria,contenidoCategoria,referenciaCategoria) VALUES (10,5,"-72.1971","https://www.distanciasentre.com/pe/moray-latitud-longitud-moray-latitud-moray-longitud/LatitudLongitudHistoria/149196.aspx");


