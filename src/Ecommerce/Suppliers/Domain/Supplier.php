<?php

namespace Core\Ecommerce\Suppliers\Domain;

class Supplier
{
    private SupplierId $id;
    private SupplierName $name;
    private SupplierEmail $email;
    private SupplierPhone $phone;

    public function __construct(SupplierId $id, SupplierName $name, SupplierEmail $email, SupplierPhone $phone)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function id(): SupplierId
    {
        return $this->id;
    }

    public function name(): SupplierName
    {
        return $this->name;
    }

    public function email(): SupplierEmail
    {
        return $this->email;
    }

    public function phone(): SupplierPhone
    {
        return $this->phone;
    }
}
