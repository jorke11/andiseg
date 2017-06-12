create view vcities as 
select c.id,c.description city,d.description department,c.code
from cities c
join departments d ON d.id=c.department_id;


create view vorders as 
select o.id,o.name,o.last_name,o.document,o.address,o.phone,o.movil,c.description city,d.description department,
p.description type_document,est.description status
from orders o 
JOIN cities c ON c.id=o.city_id
JOIN departments d ON d.id=o.department_id
JOIN parameters p ON p.code=o.document_id and p.group='type_document'
JOIN parameters est ON est.code=o.status_id and est.group='status_order'