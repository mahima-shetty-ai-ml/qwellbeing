<?php
require "pdfcrowd.php";

try
{
    // create the API client instance
    $client = new \Pdfcrowd\HtmlToPdfClient("demo", "ce544b6ea52a5621fb9d55f8b542d14d");

    // run the conversion and write the result to a file
    $client->convertUrlToFile("http://localhost:3307/qwellbeing/p_dashboard.php", "result.pdf");
}
catch(\Pdfcrowd\Error $why)
{
    // report the error
    error_log("Pdfcrowd Error: {$why}\n");

    // rethrow or handle the exception
    throw $why;
}

?>