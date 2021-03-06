<?php

/**
 * This is the model base class for the table "material_didactico".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "MaterialDidactico".
 *
 * Columns in table "material_didactico" available as properties of the model,
 * followed by relations of table "material_didactico" available as properties of the model.
 *
 * @property integer $ID
 * @property string $NOMBRE
 *
 * @property CursoEdicion[] $cursoEdicions
 */
abstract class BaseMaterialDidactico extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'material_didactico';
    }

    public static function representingColumn() {
        return 'NOMBRE';
    }

    public function rules() {
        return array(
            array('NOMBRE', 'required'),
            array('NOMBRE', 'length', 'max'=>20),
            array('ID, NOMBRE', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'cursoEdicions' => array(self::MANY_MANY, 'CursoEdicion', 'curso_has_mat_didactico(MAT_DIDACTICO_ID, CURSO_EDICION_ID)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'ID' => Yii::t('app', 'ID'),
                'NOMBRE' => Yii::t('app', 'Nombre'),
                'cursoEdicions' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('ID', $this->ID);
        $criteria->compare('NOMBRE', $this->NOMBRE, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}