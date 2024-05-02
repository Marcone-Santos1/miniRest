<?php
// post-install-cmd.php

// Define os diretórios a serem criados
$directories = [
    'routers',
    'logs',
    'cache',
    'config',
];

// Copia os arquivos de modelo para os diretórios desejados
foreach ($directories as $directory) {
    // Verifica se o diretório não existe e o cria
    if (!is_dir($directory)) {
        mkdir($directory, 0755, true);
        echo "Directory '$directory' created successfully.\n";
    } else {
        echo "Directory '$directory' already exists.\n";
    }

    // Copia os arquivos de modelo para o diretório
    copyTemplateFiles("templates/$directory", $directory);
}

/**
 * Copia os arquivos de modelo de um diretório de origem para um diretório de destino.
 *
 * @param string $sourceDir O diretório de origem dos arquivos de modelo.
 * @param string $destinationDir O diretório de destino para os arquivos copiados.
 */
function copyTemplateFiles(string $sourceDir, string $destinationDir): void
{
    $files = scandir($sourceDir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $sourceFile = "$sourceDir/$file";
            $destinationFile = "$destinationDir/$file";
            if (!file_exists($destinationFile)) {
                copy($sourceFile, $destinationFile);
                echo "File '$destinationFile' created successfully.\n";
            } else {
                echo "File '$destinationFile' already exists.\n";
            }
        }
    }
}
