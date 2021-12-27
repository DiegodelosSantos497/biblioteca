/*  */
SELECT
    libro.libro_id,
    libro.libro_isbn,
    libro.libro_titulo,
    libro.libro_fecha,
    libro.libro_edicion,
    area.area_nombre AS area,
    autor.autor_nombre as autor,
    editorial.editorial_nombre as editorial,
    pais.pais_nombre as  pais,
    tipo.tipo_nombre as tipo    
FROM
    `libro`
INNER JOIN area ON libro.libro_area_id = area.area_id
INNER JOIN autor on libro.libro_autor_id = autor.autor_id
INNER JOIN editorial ON libro.libro_editorial_id = editorial.editorial_id
INNER JOIN pais on libro.libro_pais_id = pais.pais_id
INNER JOIN tipo on libro.libro_tipo_id = tipo.tipo_id