<?php

header("Content-Type: text/html; charset=UTF-8",true);
include('simple_html_dom.php');

$html = file_get_html('http://www.proae.ufu.br/ru/cardapios/santa-monica');

$a=0;
$b=0;
$aux = array();
$auxb = array();

// Verificando onde existe mais de um field-item
foreach($html->find('div.row div.field div.field-items') as $row)
{
    
    foreach($row->find('div.field-item') as $item)
    {
        $b=$b+1;
    }
    
    if ($b != 1)
    {
        $aux[] = $a;
        $auxb[] = $b;
    }

    $b=0;
    $a = $a + 1;
}

$aux_item="";
$aux_cont=0;

// Segunda

    $segunda = array("segunda" => array(),);
    
    for($i = 0; $i < 10; $i++)
    {
    
        if ($i == 0)
        {
            // retirando o titulo do cardapio
        }
        else
        {
            if (in_array($i,$aux))
            {
                $idx_item = array_search($i,$aux);
                
                for ($j = 0; $j < $auxb[$idx_item]; $j++)
                {
                    if ( $j == ($auxb[$idx_item] - 1))
                    {
                        $aux_item = $aux_item . $html->find('div.field-item', $i+$j)->plaintext;
                    } else
                    {
                        $aux_item = $aux_item . $html->find('div.field-item', $i+$j)->plaintext . ', ';
                    }
                    
                }
                
                $aux_cont = $aux_cont + $auxb[$idx_item] - 1;
                
                $segunda["segunda"][] = $aux_item;
                
            } else
            {
                $segunda["segunda"][] = $html->find('div.field-items', $i)->plaintext;
            }
        }
        $aux_item="";
        
    }

// Terca

    $terca = array("terca" => array(),);
    
    for($i = 10; $i < 19; $i++)
    {
    
        if ($i == 0)
        {
            // retirando o titulo do cardapio
        }
        else
        {
            if (in_array($i,$aux))
            {
                $idx_item = array_search($i,$aux);
                
                for ($j = 0; $j < $auxb[$idx_item]; $j++)
                {
                    if ( $j == ($auxb[$idx_item] - 1))
                    {
                        $aux_item = $aux_item . $html->find('div.field-item', $i+$j+$aux_cont)->plaintext;
                    } else
                    {
                        $aux_item = $aux_item . $html->find('div.field-item', $i+$j+$aux_cont)->plaintext . ', ';
                    }
                    
                }
                
                
                
                $aux_cont = $aux_cont + $auxb[$idx_item] - 1;
                $terca["terca"][] = $aux_item;
                
            } else
            {
                $terca["terca"][] = $html->find('div.field-items', $i)->plaintext;
            }
        }
        $aux_item="";
        
    }
    
// Quarta

    $quarta = array("quarta" => array(),);
    
    for($i = 19; $i < 28; $i++)
    {
    
        if ($i == 0)
        {
            // retirando o titulo do cardapio
        }
        else
        {
            if (in_array($i,$aux))
            {
                $idx_item = array_search($i,$aux);
                
                for ($j = 0; $j < $auxb[$idx_item]; $j++)
                {
                    if ( $j == ($auxb[$idx_item] - 1))
                    {
                        $aux_item = $aux_item . $html->find('div.field-item', $i+$j+$aux_cont)->plaintext;
                    } else
                    {
                        $aux_item = $aux_item . $html->find('div.field-item', $i+$j+$aux_cont)->plaintext . ', ';
                    }
                    
                }
                
                
                
                $aux_cont = $aux_cont + $auxb[$idx_item] - 1;
                $quarta["quarta"][] = $aux_item;
                
            } else
            {
                $quarta["quarta"][] = $html->find('div.field-items', $i)->plaintext;
            }
        }
        $aux_item="";
        
    }
    
// Quinta

    $quinta = array("quinta" => array(),);
    
    for($i = 28; $i < 37; $i++)
    {
    
        if ($i == 0)
        {
            // retirando o titulo do cardapio
        }
        else
        {
            if (in_array($i,$aux))
            {
                $idx_item = array_search($i,$aux);
                
                for ($j = 0; $j < $auxb[$idx_item]; $j++)
                {
                    if ( $j == ($auxb[$idx_item] - 1))
                    {
                        $aux_item = $aux_item . $html->find('div.field-item', $i+$j+$aux_cont)->plaintext;
                    } else
                    {
                        $aux_item = $aux_item . $html->find('div.field-item', $i+$j+$aux_cont)->plaintext . ', ';
                    }
                    
                }
                
                
                
                $aux_cont = $aux_cont + $auxb[$idx_item] - 1;
                $quinta["quinta"][] = $aux_item;
                
            } else
            {
                $quinta["quinta"][] = $html->find('div.field-items', $i)->plaintext;
            }
        }
        $aux_item="";
        
    }

// Sexta

    $sexta = array("sexta" => array(),);
    
    for($i = 37; $i < 46; $i++)
    {
    
        if ($i == 0)
        {
            // retirando o titulo do cardapio
        }
        else
        {
            if (in_array($i,$aux))
            {
                $idx_item = array_search($i,$aux);
                
                for ($j = 0; $j < $auxb[$idx_item]; $j++)
                {
                    if ( $j == ($auxb[$idx_item] - 1))
                    {
                        $aux_item = $aux_item . $html->find('div.field-item', $i+$j+$aux_cont)->plaintext;
                    } else
                    {
                        $aux_item = $aux_item . $html->find('div.field-item', $i+$j+$aux_cont)->plaintext . ', ';
                    }
                    
                }
                
                
                
                $aux_cont = $aux_cont + $auxb[$idx_item] - 1;
                $sexta["sexta"][] = $aux_item;
                
            } else
            {
                $sexta["sexta"][] = $html->find('div.field-items', $i)->plaintext;
            }
        }
        $aux_item="";
        
    }

$result = array_merge($segunda,$terca,$quarta,$quinta,$sexta);
echo json_encode($result,JSON_UNESCAPED_UNICODE);

?>