<?php

function rupiah(int $value){
    return 'Rp. '.number_format($value, 0, ',', '.');
}
