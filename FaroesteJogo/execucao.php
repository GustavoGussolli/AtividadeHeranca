<?php

require_once('modelo/Personagem.php');
require_once('modelo/Bandido.php');
require_once('modelo/Procurador.php');

menu();
function menu()
{

    $arrayPersonagem = array();

    do {
        system('clear');
        echo "1- Criar Personagem.\n";
        echo "2- Deletar Personagem.\n";
        echo "3- Iniciar.\n";
        echo "4- Creditos.\n";
        echo "0- Sair.\n";
        $opcao = readline("Informe uma Opção:");

        switch ($opcao) {

            case '0':
                echo "Programa Encerrado!\n";
                break;

            case '1':
                array_push($arrayPersonagem, criarPersonagem());
                break;

            case '2':
                system('clear');
                mostrarDados($arrayPersonagem);

                $excluir = readline("Informe o indice para excluir: ");

                if (isset($arrayPersonagem[$excluir]) == false) {
                    echo "Índice inválido!\n";
                    break;
                } else {
                    array_splice($arrayPersonagem, $excluir, 1);
                }
                break;

            case '3':
                iniciar($arrayPersonagem);
                break;

            case '4':

                system('clear');
                echo "Feito por:\n";
                echo "Gustavo Nascimento\n";
                echo "Micael Menegassi Silva\n";
                readline('Pressione Enter Para Continuar.');
                break;

            default:
                system('clear');
                echo "Digite Uma Opção Valida!\n";
                readline('Pressione Enter Para Continuar.');
                break;
        }
    } while ($opcao != '0');

}

function criarPersonagem()
{
    echo "Escolha Uma Classe: \n";
    echo "1- Procurador.\n";
    echo "2- Bandido.\n";
    $opcao = readline("Informe uma Opção:");
    switch ($opcao) {
        case '1':
            $personagem = new Procurador();
            $personagem->setNome(readline("Informe o nome: "));
            $personagem->setVida(100);

            do {

                echo "Escolha Uma Arma: \n";
                echo "1- Colt Single Action Army (Dano: 15).\n";
                echo "2- Remington Model (Dano: 12).\n";

                $opcaoArma = readline("Informe uma Opção:");

                switch ($opcaoArma) {
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

            return $personagem;

        case '2':
            $personagem = new Bandido();
            $personagem->setNome(readline("Informe o nome: "));
            $personagem->setVida(100);

            do {
                echo "Escolha Uma Arma: \n";
                echo "1- Colt Single Action Army (Dano: 15).\n";
                echo "2- Remington Model (Dano: 12).\n";

                $opcaoArma = readline("Informe uma Opção:");

                switch ($opcaoArma) {
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

            return $personagem;

        default:
            echo "Opção inválida.\n";
            break;
    }
}

function iniciar($arrayPersonagem)
{
    system('clear');
    mostrarDados($arrayPersonagem);

    $p1 = readline("Informe o índice do primeiro personagem: ");
    $p2 = readline("Informe o índice do segundo personagem: ");

    if (isset($arrayPersonagem[$p1]) && isset($arrayPersonagem[$p2])) {

    } else {
        echo "Índice inválido!\n";
        return;
    }

    $personagem1 = $arrayPersonagem[$p1];
    $personagem2 = $arrayPersonagem[$p2];

    sistemaBatalha($personagem1, $personagem2);

}

function sistemaBatalha($personagem1, $personagem2)
{
    system('clear');
    echo "========================================\n";
    echo "Batalha entre " . $personagem1->getNome() . " e " . $personagem2->getNome() . " começou!\n";
    echo "========================================\n";
    $pular = readline("Aperte Enter");

    $turno = 1;
    while ($personagem1->getVida() > 0 && $personagem2->getVida() > 0) {

        system('clear');
        echo "\n*** Turno $turno ***\n";
        echo $personagem1->getNome() . ": " . $personagem1->getVida() . " HP\n";
        echo $personagem2->getNome() . ": " . $personagem2->getVida() . " HP\n";

        echo "\nEscolha quem será o atacante:\n";
        echo "1- " . $personagem1->getNome() . "\n";
        echo "2- " . $personagem2->getNome() . "\n";

        $escolhaAtacante = readline("Informe a sua escolha: ");

        if ($escolhaAtacante == 1) {
            $atacante = $personagem1;
            $defensor = $personagem2;
        } else {
            $atacante = $personagem2;
            $defensor = $personagem1;
        }

        system('clear');
        echo "\n" . $atacante->getNome() . " está atacando " . $defensor->getNome() . "!\n";
        echo "Escolha o alvo:\n";
        echo "1- Cabeça (Alto dano, baixa chance)\n";
        echo "2- Torso (Dano médio, média chance)\n";
        echo "3- Perna (Baixo dano, alta chance)\n";

        $escolha = readline("Informe a sua escolha: ");
        $resultado = executarAtaque($atacante, $defensor, $escolha);

        echo $resultado . "\n";

        if ($defensor->getVida() <= 0) {
            system('clear');
            echo "\n========================================\n";
            echo $defensor->getNome() . " foi derrotado!\n";
            echo $atacante->getNome() . " venceu a batalha!\n";
            echo "========================================\n";
            break;
        }

        $turno++;
    }
}

function executarAtaque($atacante, $defensor, $escolha)
{

    $dano = 0;
    $sorte = rand(1, 100);
    $danoArma = obterDanoArma($atacante);

    switch ($escolha) {
        case '1':
            if ($sorte <= 20) {
                $dano = $danoArma * 10;
                $defensor->setVida($defensor->getVida() - $dano);
                echo "Acertou a cabeça! Dano crítico: $dano\n";
            } else {
                echo "Errou o tiro na cabeça!\n";
            }
            break;

        case '2':
            if ($sorte <= 50) {
                $dano = $danoArma * 2;
                $defensor->setVida($defensor->getVida() - $dano);
                echo "Acertou o torso! Dano: $dano\n";
            } else {
                echo "Errou o tiro no torso!\n";
            }
            break;

        case '3':
            if ($sorte <= 90) {
                $dano = $danoArma;
                $defensor->setVida($defensor->getVida() - $dano);
                echo "Acertou a perna! Dano: $dano\n";
            } else {
                echo "Errou o tiro na perna!\n";
            }
            break;

        default:
            echo "Escolha inválida, perdeu a vez!\n";
            break;
    }

    readline("Pressione Enter para continuar...");
    return;
}

function obterDanoArma($personagem)
{

    switch ($personagem->getArma()) {
        case "Colt Single Action Army":
            return 15;
        case "Remington Model":
            return 12;
        default:
            return 10;
    }
}

function mostrarDados($arrayPersonagem)
{

    foreach ($arrayPersonagem as $p) {

        if ($p instanceof Procurador) {
            echo "Classe: Procurador\n";
            echo "Nome: " . $p->getNome() . "\n";
            echo "Arma: " . $p->getArma() . "\n";
        } else if ($p instanceof Bandido) {
            echo "Classe: Bandido\n";
            echo "Nome: " . $p->getNome() . "\n";
            echo "Arma: " . $p->getArma() . "\n";
        }

        echo "----------------------------- \n";
    }
}