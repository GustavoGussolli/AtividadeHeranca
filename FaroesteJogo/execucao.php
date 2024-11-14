<?php
require_once('modelo/Bandido.php');
require_once('modelo/Duelo.php');
require_once('modelo/Personagem.php');
require_once('modelo/Procurador.php');

menu();
function menu(){

    $arrayPersonagem = array();
    
    do {
    echo "1- Selecionar Classe.\n";
    echo "2- Creditos.\n";
    echo "3- Iniciar.\n";
    echo "0- Sair.\n";
    $opcao = readline("Informe uma Opção:");
    
        switch ($opcao) {
            case '0':
                echo "Saindo...\n";
            break;
            
            case '1':
                system('clear');
                array_push($arrayPersonagem, selecionarPersonagem());
                system('clear');
            break;
    
            case '2':
                system('clear');
                echo "Feito por:\n";
                echo "Gustavo Nascimento\n";
                echo "Micael Menegassi Silva\n";
                readline('Pressione Enter Para Continuar.');
                system('clear');
            break;

            case '3':
                system('clear');
                iniciar($arrayPersonagem);
                system('clear');
            break;
    
            default:
                system('clear');
                echo "Digite Uma Opção Valida\n";
                readline('Pressione Enter Para Continuar.');
                system('clear');
            break;
        }
    } while ($opcao != '0');
    
}

function selecionarPersonagem(){
    echo "1- Procurador.\n";
    echo "2- Bandido.\n";
    $opcao = readline("Informe uma Opção:");
    switch ($opcao) {
        case '1':
            $personagem = new Procurador();
            $personagem->setNome(readline("Informe o nome: "));
            $personagem->setVida(100);
            $personagem->setDano(10);
            $personagem->setHonra(readline("Informe a Honra do Procurador: "));
            $personagem->setDinheiro(100);
            
            do{
                echo "1- Colt Single Action Army. \n";
                echo "2- Remington Model. \n";

                $opcaoArma = readline("Informe uma Opção:");

                switch ($opcaoArma){
                    case '1':
                        $personagem->setArma("Colt Single Action Army");
                        break;

                    case '2':
                        $personagem->setArma("Remington Model");
                        break;
                
                    default:
                        echo "Opção Invalida! \n";
                        break;
                }
                
            } while ($opcaoArma != '1' && $opcaoArma != '2');

            do {
                echo "Você tem ". $personagem->getDinheiro() . " de Dinheiro.\n";
                echo "1- Sim Voce Diminuira o seu Dinheiro em 50.\n";
                echo "2- Não.\n";
                $rifle = readline("Deseja comprar um Rifle: ");
                switch ($rifle) {
                    case '1':
                        $personagem->setDinheiro($personagem->getDinheiro()-50);
                        $personagem->setRifle(true);
                        break;

                    case '2':
                        $personagem->setRifle(false);
                        break;
                    
                    default:
                        echo "Opção Invalida.\n";
                        break;
                }
            } while ($rifle != '1' && $rifle != '2');

            return $personagem;
        break;
        
        case '2':
            $personagem = new Bandido();
            $personagem->setNome(readline("Informe o nome: "));
            $personagem->setApelido(readline("Informe o Apelido: "));
            $personagem->setVida(100);
            $personagem->setDano(10);
            $personagem->setNivelProcurado(readline("Informe o Nivel de Matança: "));
            $personagem->setDinheiro(100);
            
            do{
                echo "1- Colt Single Action Army. \n";
                echo "2- Remington Model. \n";

                $opcaoArma = readline("Informe uma Opção:");

                switch ($opcaoArma){
                    case '1':
                        $personagem->setArma("Colt Single Action Army");
                        break;

                    case '2':
                        $personagem->setArma("Remington Model");
                        break;
                
                    default:
                        echo "Opção Invalida! \n";
                        break;
                }
                
            } while ($opcaoArma != '1' && $opcaoArma != '2');

            do {
                echo "Você tem ". $personagem->getDinheiro() . " de Dinheiro.\n";
                echo "1- Sim Voce Diminuira o seu Dinheiro em 20.\n";
                echo "2- Não.\n";
                $opcaoArmaBranca = readline("Deseja comprar uma Arma Branca: ");
                switch ($opcaoArmaBranca) {
                    case '1':
                        $personagem->setDinheiro($personagem->getDinheiro()-20);
                        $personagem->setArmaBranca(true);
                        break;

                    case '2':
                        $personagem->setArmaBranca(false);
                        break;
                    
                    default:
                        echo "Opção Invalida.\n";
                        break;
                }
            } while ($opcaoArmaBranca != '1' && $opcaoArmaBranca != '2');

            return $personagem;
        break;

        default:
            echo "Opção inválida.\n";
            break;
    }
}

function iniciar($arrayPersonagem){
    echo "----------------------------- \n";

    foreach ($arrayPersonagem as $p){
        echo $p->getNome() . "\n";
        echo $p->getDano() . "\n";
        echo $p->getArma() . "\n";
        echo $p->getDinheiro() . "\n";

        if ($p instanceof Procurador) {
            echo $p->getHonra() . "\n";
            echo ($p->isRifle() ? "Rifle: Sim \n" : "Rifle: Não \n");
        } else if ($p instanceof Bandido) {
            echo $p->getNivelProcurado() . "\n";
            echo ($p->isArmaBranca() ? "Arma Branca: Sim \n" : "Arma Branca: Não \n");
        }

        echo "----------------------------- \n";
    }

    $variable = readline("Informe o índice do Personagem: ");
    if (isset($arrayPersonagem[$variable])) {
        $personagemEscolhido = $arrayPersonagem[$variable];
        echo "Personagem escolhido: " . $personagemEscolhido->getNome() . "\n";
    } else {
        echo "Índice inválido!\n";
    }
    readline('Pressione Enter Para Continuar.');
}
