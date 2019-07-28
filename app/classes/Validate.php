<?php
    class Validate
    {
        private $_passed = false,
                $_errors = array(),
                $_db = null;


        public function __construct($levelid = '', $classid = ''){
            $this->level_id_val = $levelid;
            $this->class_id_val = $classid;
        }

        public function check($source, $items = array()) {
            foreach($items as $item => $rules) {
                foreach($rules as $rule => $rule_value){
                    
                    $value = trim($source[$item]);
                    $item = escape($item);
                    
                    if($rule === 'required' && empty($value)){
                        $this->addError($item, "{$item} is required");
                    }else if(!empty($value)){
                        switch($rule){
                            case 'greater':
                                if($value <= $source[$rule_value]){
                                    $this->addError("$item", "{$item} value must be greater than {$rule_value} value.");
                                }
                            break;
                            case 'difference':
                                $explode = explode('.', $rule_value);
                                if($value - $source[$explode[0]] != $explode[1]){
                                    $this->addError("$item", "The difference between {$item} and {$explode[0]} must be {$explode[1]}.");
                                }
                            break;
                            case 'min':
                                if(strlen($value) < $rule_value){
                                    $this->addError("$item", "{$item} must be a minimum of {$rule_value} characters.");
                                }
                            break;
                            case 'max':
                            if(strlen($value) > $rule_value){
                                $this->addError("$item", "{$item} must be a maximum of {$rule_value} characters.");
                            }
                            break;
                            case 'matches':
                                if($value != $source[$rule_value]){
                                    $this->addError("$item", "{$rule_value} must match {$item}");
                                }
                            break;
                            case 'unique':
                                if(is_object($rule_value) === false){
                                    $ruleVal = new $rule_value;
                                    if($ruleVal->where($item, $value)->first()){
                                        $this->addError($item, "{$item} already exist.");
                                    }
                                }else{
                                    if($rule_value->where($item, $value)->first()){
                                        $this->addError($item, "{$item} already exist.");
                                    }
                                }
                            break;
                            case 'uniquEdit':

                                $model  = explode('.', $rule_value)[0];
                                $id  = explode('.', $rule_value)[1];
                                
                                if( $model::where($item ,$value)->where('id', '!=', $id)->first()){
                                    $this->addError($item, "$item is already taken.");
                                }
                            break;
                            case 'unique_class':
                                if($rule_value->where($item, $value)->first() && $rule_value->where($item, $value)->first()->id != $this->class_id_val){
                                    $this->addError($item, "{$item} with value {$value} already exist.");
                                }
                            break;
                            case 'unique_level':
                                if($rule_value->where($item, $value)->first() && $rule_value->where($item, $value)->first()->id != $this->level_id_val){
                                    $this->addError($item, "{$item} with value {$value} already exist.");
                                }
                            break;
                            case 'numeric':
                                if(!is_numeric($value)){
                                    $this->addError($item, "{$item} must be a numeric value.");
                                }
                            break;
                        }
                    }
                }
            }

            if(empty($this->_errors)){
                $this->_passed = true;
            }

            return $this;
        }

        public function addError($field, $error){
            $this->_errors[$field][] = $error;
            Session::put('inputs-errors', $this->_errors);
        }

        public function errors(){
            return $this->_errors;
        }

        public function passed(){
            return $this->_passed;
        }
    }