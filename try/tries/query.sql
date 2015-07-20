select  product.code as productcode, product.`name` as productname,
       `type`.code  as typecode   ,`type`.description as typedescription,
        properties.code as propertiescode, properties.description as propertiesdescription,
        properties.requiered as propertiesrequiered, characteristic.code as characteristiccode,
        characteristic.description as characteristicdescription, characteristic.requiered as characteristicrequiered

from product
inner join `type`
on product.`type` = type.idtype
inner join properties
on properties.`type` = type.idtype
inner join characteristic
on characteristic.property = properties.idproperties
where product.`idProduct` = 2;


select * from properties where `type` = 1;



