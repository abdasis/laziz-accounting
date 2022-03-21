<?php

function rupiah($nilai){
    return 'Rp. ' . number_format($nilai, 2, ',','.');
}

