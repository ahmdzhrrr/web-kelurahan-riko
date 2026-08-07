<?php

namespace App\Core; 

class Validator
{
    protected $data = [];

    protected $rules = [];

    protected $errors = [];

    protected $attributes = [];

    public function __construct(array $data, array $rules)
    {
        $this->data = $data;

        $this->rules = $rules;
    }

    public static function make(array $data, array $rules): self
    {
        return new self($data, $rules);
    }

    public function setAttributes(array $attributes): self
    {
        $this->attributes = $attributes;

        return $this;
    }

    protected function fieldName($field)
    {
        return $this->attributes[$field] ?? ucfirst(str_replace('_', ' ', $field));
    }

    public function validate(): bool
    {
        foreach ($this->rules as $field => $ruleString) {

            $rules = explode('|', $ruleString);

            $value = trim($this->data[$field] ?? '');

            foreach ($rules as $rule) {

                $this->applyRule($field, $value, $rule);

            }

        }

        return empty($this->errors);
    }

    public function fails(): bool
    {
        return !$this->validate();
    }

    public function passes(): bool
    {
        return $this->validate();
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function firstError(): ?string
    {
        if(empty($this->errors)){

            return null;

        }

        return current($this->errors)[0];
    }

    protected function applyRule($field, $value, $rule)
    {
        $parameter = null;

        if (strpos($rule, ':') !== false) {

            [$rule, $parameter] = explode(':', $rule, 2);

        }

        switch ($rule) {

            case 'required':
                $this->validateRequired($field, $value);
                break;

            case 'email':
                $this->validateEmail($field, $value);
                break;

            case 'numeric':
                $this->validateNumeric($field, $value);
                break;

            case 'integer':
                $this->validateInteger($field, $value);
                break;

            case 'min':
                $this->validateMin($field, $value, $parameter);
                break;

            case 'max':
                $this->validateMax($field, $value, $parameter);
                break;

            case 'url':
                $this->validateUrl($field, $value);
                break;

            case 'date':
                $this->validateDate($field, $value);
                break;

        }

    }

    protected function addError($field, $message)
    {
        $this->errors[$field][] = $message;
    }

    protected function validateRequired($field, $value)
    {
        if ($value === '' || $value === null) {
            $this->addError(
                $field,
                $this->fieldName($field) . " wajib diisi."
            );
        }
    }

    protected function validateEmail($field, $value)
    {
        if ($value === '') return;

        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->addError(
                $field,
                $this->fieldName($field) . " harus berupa email yang valid."
            );
        }
    }

    protected function validateNumeric($field, $value)
    {
        if ($value === '') return;

        if (!is_numeric($value)) {
            $this->addError(
                $field,
                $this->fieldName($field) . " harus berupa angka."
            );
        }
    }

    protected function validateInteger($field, $value)
    {
        if ($value === '') return;

        if (filter_var($value, FILTER_VALIDATE_INT) === false) {
            $this->addError(
                $field,
                $this->fieldName($field) . " harus berupa bilangan bulat."
            );
        }
    }

    protected function validateMin($field, $value, $min)
    {
        if ($value === '') return;

        if (is_numeric($value)) {

            if ($value < $min) {
                $this->addError(
                    $field,
                    $this->fieldName($field) . " minimal {$min}."
                );
            }

            return;
        }

        if (mb_strlen($value) < (int)$min) {
            $this->addError($field, "{$field} minimal {$min} karakter.");
        }
    }

    protected function validateMax($field, $value, $max)
    {
        if ($value === '') return;

        if (is_numeric($value)) {

            if ($value > $max) {
                $this->addError(
                    $field,
                    $this->fieldName($field) . " maksimal {$max}."
                );
            }

            return;
        }

        if (mb_strlen($value) > (int)$max) {
            $this->addError(
                $field,
                $this->fieldName($field) . " maksimal {$max} karakter."
            );
        }
    }

    protected function validateUrl($field, $value)
    {
        if ($value === '') return;

        if (!filter_var($value, FILTER_VALIDATE_URL)) {
            $this->addError(
                $field,
                $this->fieldName($field) . " harus berupa URL yang valid."
            );
        }
    }

    protected function validateDate($field, $value)
    {
        if ($value === '') return;

        if (strtotime($value) === false) {
            $this->addError(
                $field,
                $this->fieldName($field) . " harus berupa tanggal yang valid."
            );
        }
    }
}