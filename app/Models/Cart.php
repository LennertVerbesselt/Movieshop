<?php

namespace App\Models;

class Cart
{
    public $items = array();
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct()
    {
    }

    public function add(array $cart, $id)
    {

          if(array_key_exists($id, $cart))
          {
            $cart[$id]++;
          } else {
            $cart[$id] = 1;
          }
          return $cart;

        }

      }
