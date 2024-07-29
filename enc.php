<?php
// Function to decode hex-encoded strings within a given text
function autoHexDecode($text) {
    // Pattern to match hex-encoded sequences like \x6d\x6f
    $pattern = '/\\\\x([0-9a-fA-F]{2})/';
    
    // Callback function to decode each hex-encoded character
    $callback = function($matches) {
        return chr(hexdec($matches[1]));
    };
    
    // Replace all hex-encoded sequences with their decoded characters
    return preg_replace_callback($pattern, $callback, $text);
}

// Read the encoded string from the file
$filename = 'encoded_string.txt';
if (file_exists($filename)) {
    $encodedString = file_get_contents($filename);
    
    // Decode the string
    $decodedString = autoHexDecode($encodedString);
    
    // Display the results
    echo "Encoded string from file:\n" . $encodedString . "\n\n";
    echo "Decoded string:\n" . $decodedString . "\n";
} else {
    echo "File not found: " . $filename . "\n";
}
?>
