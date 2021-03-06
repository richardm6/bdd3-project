<?php

/**
 * This is the model base class for the table "centro_recaudacion_depositos".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "CentroRecaudacionDepositos".
 *
 * Columns in table "centro_recaudacion_depositos" available as properties of the model,
 * followed by relations of table "centro_recaudacion_depositos" available as properties of the model.
 *
 * @property integer $ID
 * @property string $NRO_FACTURA
 * @property string $VALOR
 * @property integer $PERSONA_ID
 * @property integer $CURSO_EDICION_ID
 *
 * @property CursoEdicion $cURSOEDICION
 */
abstract class BaseCentroRecaudacionDepositos extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'centro_recaudacion_depositos';
    }

    public static function representingColumn() {
        return 'NRO_FACTURA';
    }

    public function rules() {
        return array(
            array('NRO_FACTURA, VALOR, PERSONA_ID, CURSO_EDICION_ID', 'required'),
            array('PERSONA_ID, CURSO_EDICION_ID', 'numerical', 'integerOnly'=>true),
            array('NRO_FACTURA', 'length', 'max'=>20),
            array('VALOR', 'length', 'max'=>10),
            array('ID, NRO_FACTURA, VALOR, PERSONA_ID, CURSO_EDICION_ID', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'cURSOEDICION' => array(self::BELONGS_TO, 'CursoEdicion', 'CURSO_EDICION_ID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'ID' => Yii::t('app', 'ID'),
                'NRO_FACTURA' => Yii::t('app', 'Nro Factura'),
                'VALOR' => Yii::t('app', 'Valor'),
                'PERSONA_ID' => Yii::t('app', 'Persona'),
                'CURSO_EDICION_ID' => Yii::t('app', 'Curso Edicion'),
                'cURSOEDICION' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('ID', $this->ID);
        $criteria->compare('NRO_FACTURA', $this->NRO_FACTURA, true);
        $criteria->compare('VALOR', $this->VALOR, true);
        $criteria->compare('PERSONA_ID', $this->PERSONA_ID);
        $criteria->compare('CURSO_EDICION_ID', $this->CURSO_EDICION_ID);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}