<?php

namespace App\Http\Controllers\office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Response extends Controller
{

    /* http://multirifa.test/response-payu?&merchantId=508029&merchant_name=Test+PayU+Test&merchant_address=Av+123+Calle+12&telephone=7512354&merchant_url=http%3A%2F%2Fpruebaslapv.xtrweb.com&transactionState=6&lapTransactionState=DECLINED&message=Declinada&referenceCode=13&reference_pol=7069375&transactionId=f5e668f1-7ecc-4b83-a4d1-0aaa68260862&description=test_payu_01&trazabilityCode=&cus=&orderLanguage=es&extra1=&extra2=&extra3=&polTransactionState=6&signature=3858aa45c598af73a971c09b7ed51f24&polResponseCode=5&lapResponseCode=ENTITY_DECLINED&risk=1.00&polPaymentMethod=10&lapPaymentMethod=VISA&polPaymentMethodType=2&lapPaymentMethodType=CREDIT_CARD&installmentsNumber=1&TX_VALUE=100.00&TX_TAX=.00&currency=USD&lng=es&pseCycle=&buyerEmail=test%40payulatam.com&pseBank=&pseReference1=&pseReference2=&pseReference3=&authorizationCode=&TX_ADMINISTRATIVE_FEE=.00&TX_TAX_ADMINISTRATIVE_FEE=.00&TX_TAX_ADMINISTRATIVE_FEE_RETURN_BASE=.00 */

    /* 4Vj8eK4rloUd272L48hsrarnUA  508029 13 100.00 6 
    
    signature=e1b0939bbdc99ea84387bee9b90e4f5c*/


    public function index(Request $request)
    {

        $ApiKey = env('PAYU_APIKEY');
        $merchant_id = $request->merchantId;
        $referenceCode = $request->referenceCode;
        $TX_VALUE = $request->TX_VALUE;

        // Obtener el nuevo valor new_value
        $integer_part = floor($TX_VALUE); // parte entera.
        $first_decimal = intval(($TX_VALUE  - $integer_part) * 10); // primer decimal.
        $second_decimal = intval(($TX_VALUE  * 100) % 10); // segundo decimal.

        if ($first_decimal % 2 == 0) {
            //el nuero es par
            if ($second_decimal == 5) {
                $resultado = round($TX_VALUE, 1, PHP_ROUND_HALF_DOWN);
                $New_value = number_format($resultado, 1, '.', '');
            } else {
                $resultado = round($TX_VALUE, 1);
                $New_value = number_format($resultado, 1, '.', '');
            }
        } else {
            if ($second_decimal == 5) {
                //el nuero es impar
                $resultado = round($TX_VALUE, 1, PHP_ROUND_HALF_UP);
                $New_value = number_format($resultado, 1, '.', '');
            } else {
                $resultado = round($TX_VALUE, 1);
                $New_value = number_format($resultado, 1, '.', '');
            }
        };

        $currency = $request->currency;
        $transactionState = $request->transactionState;
        $firma_cadena = "$ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
        $firmacreada = md5($firma_cadena);
        $firma = $request->signature;
        $reference_pol = $request->reference_pol;
        $cus = $request->cus;
        $extra1 = $request->description;
        $pseBank = $request->pseBank;
        $lapPaymentMethod = $request->lapPaymentMethod;
        $transactionId = $request->transactionId;

        if ($transactionState == 4 ) {
            $estadoTx = "Transacción aprobada";
        }
        
        else if ($transactionState== 6 ) {
            $estadoTx = "Transacción rechazada";
        }
        
        else if ($transactionState== 104 ) {
            $estadoTx = "Error";
        }
        
        else if ($transactionState== 7 ) {
            $estadoTx = "Pago pendiente";
        }
        
        else {
            $estadoTx='mensaje';
        }

        /* $merchantId = $request->input('merchantId');
        $merchantName = $request->input('merchant_name');
        $merchantAddress = $request->input('merchant_address');
        $telephone = $request->input('telephone');
        $merchantUrl = $request->input('merchant_url');
        $transactionState = $request->input('transactionState');
        $lapTransactionState = $request->input('lapTransactionState');
        $message = $request->input('message');
        $referenceCode = $request->input('referenceCode');
        $referencePol = $request->input('reference_pol');
        $transactionId = $request->input('transactionId');
        $description = $request->input('description');
        $trazabilityCode = $request->input('trazabilityCode');
        $cus = $request->input('cus');
        $orderLanguage = $request->input('orderLanguage');
        $extra1 = $request->input('extra1');
        $extra2 = $request->input('extra2');
        $extra3 = $request->input('extra3');
        $polTransactionState = $request->input('polTransactionState');
        $signature = $request->input('signature');
        $polResponseCode = $request->input('polResponseCode');
        $lapResponseCode = $request->input('lapResponseCode');
        $risk = $request->input('risk');
        $polPaymentMethod = $request->input('polPaymentMethod');
        $lapPaymentMethod = $request->input('lapPaymentMethod');
        $polPaymentMethodType = $request->input('polPaymentMethodType');
        $lapPaymentMethodType = $request->input('lapPaymentMethodType');
        $installmentsNumber = $request->input('installmentsNumber');
        $TX_VALUE = $request->input('TX_VALUE');
        $TX_TAX = $request->input('TX_TAX');
        $currency = $request->input('currency');
        $lng = $request->input('lng');
        $pseCycle = $request->input('pseCycle');
        $buyerEmail = $request->input('buyerEmail');
        $pseBank = $request->input('pseBank');
        $pseReference1 = $request->input('pseReference1');
        $pseReference2 = $request->input('pseReference2');
        $pseReference3 = $request->input('pseReference3');
        $authorizationCode = $request->input('authorizationCode');
        $TX_ADMINISTRATIVE_FEE = $request->input('TX_ADMINISTRATIVE_FEE');
        $TX_TAX_ADMINISTRATIVE_FEE = $request->input('TX_TAX_ADMINISTRATIVE_FEE');
        $TX_TAX_ADMINISTRATIVE_FEE_RETURN_BASE = $request->input('TX_TAX_ADMINISTRATIVE_FEE_RETURN_BASE'); */

        // Aquí puedes procesar los datos recibidos de la URL


        return view('office.response-payu', compact('request', 'firmacreada', 'firma', 'estadoTx'));
    }
}
