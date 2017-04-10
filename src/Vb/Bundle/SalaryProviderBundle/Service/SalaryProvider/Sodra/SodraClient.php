<?php

namespace Vb\Bundle\SalaryProviderBundle\Service\SalaryProvider\Sodra;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Psr\Log\LoggerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;

use function GuzzleHttp\Psr7\stream_for;

class SodraClient
{
    private $client;
    private $logger;
    private $filesystem;
    private $tempDir;

    public function __construct(
        ClientInterface $client,
        LoggerInterface $logger,
        Filesystem $filesystem,
        string $tempDir
    ) {
        $this->client = $client;
        $this->logger = $logger;
        $this->filesystem = $filesystem;
        $this->tempDir = $tempDir;
    }

    public function getSalariesResource()
    {
        $file = $this->filesystem->tempnam($this->tempDir, 'zip');
        try {
            $this->client->request(Request::METHOD_GET, 'Vidurkiai.zip', ['sink' => $file]);
        } catch (RequestException $requestException) {
            $this->logger->error(
                'Got RequestException while downloading SODRA salaries file',
                [$requestException]
            );
        }

        return $this->extractCsv($file);
    }

    private function extractCsv(string $file)
    {
        $zip = new \ZipArchive();
        $zip->open($file);

        $csv = $zip->getFromName('VIDURKIAI.CSV');
        $zip->close();
        unlink($file);

        $stream = stream_for();
        $stream->write($csv);
        $stream->rewind();

        return $stream->detach();
    }
}
