<?php

    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "CarQuery.php";

    // prelevo il tipo di form
    $tipo = $_POST['tipoForm'];
    
    switch($tipo){
        case "Nome":
            Nome();
            break;
        case "citta":
            Citta();
            break;
        case "indirizzo":
            Indirizzo();
            break;
        case "Foto":
            Foto();
            break;
        case "Password":
            Password();
            break;
        case "Telefono":
            Telefono();
            break;
        case "Descrizione":
            Descrizione();
            break;
        case "Orari":
            Orari();
            break;
        case "ModificaAutoNuovo":
            ModificaAutoNuovo();
            break;
        case "ModificaAutoUsato":
            ModificaAutoUsato();
            break;
        default:
            break;
    }


    // funzioni di modifica nel database
    function Nome(){
        
        $codConcessionaria = $_POST['codConcessionaria'];
        $Nome = $_POST['Nome'];

        if(isset($Nome)){
            if(modificaNomeConcessionaria($codConcessionaria,$Nome))
            {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    function Citta(){
        
        $codConcessionaria = $_POST['codConcessionaria'];
        $citta = $_POST['citta'];
        $provincia = $_POST['provincia'];
        $cap = $_POST['cap'];

        if(isset($citta) && isset($provincia) && isset($cap)){
            if(modificaCittaConcessionaria($codConcessionaria,$citta,$provincia,$cap))
            {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    function Indirizzo(){
        
        $codConcessionaria = $_POST['codConcessionaria'];
        $via = $_POST['via'];
        $civico = $_POST['civico'];

        if(isset($via) && isset($civico)){
            if(modificaViaConcessionaria($codConcessionaria,$via,$civico))
            {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }


    function Foto(){

        $codConcessionaria = $_POST['codConcessionaria'];

        $risultato = getConcessionariaById($codConcessionaria);
        $rigaRisultato = $risultato->fetch_assoc();

        $dir = './../../img/concessionaria/';
        $name = $rigaRisultato['usernameConcessionaria'];

        $tmp = $_FILES['Foto']['tmp_name'];
        $imgtype = $_FILES['Foto']['type'];
        
        $type = explode("/",$imgtype);

        $percorsoDatabase = './../img/concessionaria/' . $name .'.'. $type[1];

        modificaFotoProfiloConcessionaria($codConcessionaria,$percorsoDatabase);

        move_uploaded_file($tmp , $dir . $name .'.'. $type[1]);
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }


    function Password(){
        $codConcessionaria = $_POST['codConcessionaria'];
        $Password = $_POST['Pass1'];

        if(isset($Password)){
            $passHash = password_hash($Password,PASSWORD_BCRYPT);
            if(modificaPasswordConcessionaria($codConcessionaria,$passHash))
            {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }


    function Telefono(){
        $codConcessionaria = $_POST['codConcessionaria'];
        $Telefono = $_POST['Telefono'];

        if(isset($Telefono)){
            if(modificaTelefonoConcessionaria($codConcessionaria,$Telefono))
            {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }


    function Descrizione(){
        $codConcessionaria = $_POST['codConcessionaria'];
        $Descrizione = $_POST['Descrizione'];

        if(isset($Descrizione)){
            if(modificaDescrizioneConcessionaria($codConcessionaria,$Descrizione))
            {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    function Orari(){
        $codConcessionaria = $_POST['codConcessionaria'];
        $lunedi = $_POST['lunedi'];
        $martedi = $_POST['martedi'];
        $mercoledi = $_POST['mercoledi'];
        $giovedi = $_POST['giovedi'];
        $venerdi = $_POST['venerdi'];
        $sabato = $_POST['sabato'];
        $domenica = $_POST['domenica'];

        if(isset($lunedi)&&isset($martedi)&&isset($mercoledi)&&isset($giovedi)&&isset($venerdi)&&isset($sabato)&&isset($domenica)){
            if(modificaOrariConcessionaria($codConcessionaria,$lunedi,$martedi,$mercoledi,$giovedi,$venerdi,$sabato,$domenica))
            {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    function ModificaAutoNuovo(){
        $codAuto = $_POST['codAuto'];
        $prezzo = $_POST['prezzo'];


        if(isset($prezzo)){
            if(ModificaAutoNuovoQuery($codAuto,$prezzo))
            {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }


    function ModificaAutoUsato(){
        $codAuto = $_POST['codAuto'];
        $prezzo = $_POST['prezzo'];
        $anno = $_POST['anno'];
        $km = $_POST['km'];
        $ultManu = $_POST['ultManu'];
        $numPro = $_POST['numPro'];

        if(isset($prezzo)&&isset($anno)&&isset($km)&&isset($ultManu)&&isset($numPro)){
            if(ModificaAutoUsatoQuery($codAuto,$prezzo,$anno,$km,$ultManu,$numPro))
            {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }

?>