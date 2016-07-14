
<script>
$(document).ready(function(){

             $('#contact-form').validate(
             {
              rules: {
                name: {
                  minlength: 2,
                  required: true
                },
                email: {
                  required: true,
                  email: true
                },
                message: {
                  minlength: 2,
                  required: true
                }
              },
              highlight: function(element) {
                $(element).closest('.control-group').removeClass('success').addClass('error');
              },
              success: function(element) {
                element
                .text('OK!').addClass('valid')
                .closest('.control-group').removeClass('error').addClass('success');
              }
             });
            }); // end document.ready
            </script>
            
            
<?php?>
            
            $hashids = new Hashids('this is my salt', 10, 'abcdefghijklmnopqrstxyz1234567890');
//
//            $id = $hashids->encode_hex('123');
//            $numbers = $hashids->decode_hex($id);
            $numbersTest = $hashids->encode('123');
            var_dump( $numbersTest);
            
//        $key = "1234567890abcdefghijk";
//        $text="abc";
//        $encrypted = bin2hex(openssl_encrypt($text,'AES-128-CBC', $key));
//        $decrypted=openssl_decrypt(hex2bin($encrypted),'AES-128-CBC',$key);
//        var_dump($encrypted,$decrypted);
//        $token = substr(md5(uniqid(rand(), true)),0,6);
//        pre($token);