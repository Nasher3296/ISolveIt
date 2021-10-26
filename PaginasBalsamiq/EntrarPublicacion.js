function EntrarPublicacion(){
    id = document.getElementById("cons"+".$resultadoTag['id_cons'].");
    document.location="dentro-publicacion.php?id=";
}

var fotoperfil = </?php echo json_encode($resultadoUser['imagen']); ?>;
var nombre = </?php echo json_encode($resultadoUser["nombre"]); ?>;
var arroba = </?php echo json_encode($resultadoUser['username']); ?>;
var titulo = </?php echo json_encode($resultadoCon['titulo']); ?>;
var recompensa = </?php echo json_encode($resultadoCon["recompensa"]); ?>;
var descripcion = </?php echo json_encode($resultadoCon['descripcion']); ?>;
var FechaSubida = </?php echo json_encode($resultadoCon["fecha_subida"]); ?>;
var FechaLimite = </?php echo json_encode($resultadoCon["fecha_limite"]); ?>;