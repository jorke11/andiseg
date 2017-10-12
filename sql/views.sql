
create view vcities as 
select c.id,c.description city,d.description department,c.code
from cities c
join departments d ON d.id=c.department_id;

drop view vorders
create view vorders as 
select o.id,o.name,o.last_name,o.document,o.address,o.phone,o.mobil,c.description city,d.description department,
p.description type_document,est.description status,cli.business_name as client,o.cost_center,sch.description as schema,
ev.description as event,coalesce((aso.name || ' ' ||aso.last_name),'') as responsible,o.event_id,cli.id as client_id,o.created_at,
o.assigned,now()- o.created_at as tiempo_transcurrido,
cli.executive_id,o.insert_id,o.position,o.neighborhood,o.city_id,o.comment
from orders o 
JOIN cities c ON c.id=o.city_id
JOIN users u ON u.id=o.insert_id
LEFT JOIN users aso ON aso.id=o.responsible_id
JOIN clients cli ON cli.id=u.client_id
JOIN schedules sch ON sch.id=o.schema_id
JOIN departments d ON d.id=o.department_id
JOIN parameters p ON p.code=o.document_id and p.group='type_document'
JOIN parameters est ON est.code=o.status_id and est.group='status_order'
JOIN parameters ev ON ev.code=o.event_id and ev.group='events' Order BY o.created_at desc;



create view vtraicing as 
select o.id,o.name,o.last_name,o.document,o.address,o.phone,o.mobil,c.description city,d.description department,
p.description type_document,est.description status,cli.business_name as client,o.cost_center,sch.description as schema,
ev.description as event,aso.name || ' ' ||aso.last_name responsible,o.event_id,responsible_id,o.status_id
from orders o 
JOIN cities c ON c.id=o.city_id
JOIN users u ON u.id=o.insert_id
LEFT JOIN users aso ON aso.id=o.responsible_id
JOIN clients cli ON cli.id=u.client_id
JOIN schedules sch ON sch.id=o.schema_id
JOIN departments d ON d.id=o.department_id
JOIN parameters p ON p.code=o.document_id and p.group='type_document'
JOIN parameters est ON est.code=o.status_id and est.group='status_order'
JOIN parameters ev ON ev.code=o.event_id and ev.group='events'
WHERE o.status_id<>1;




create view vclient as
select  c.id,reg.description regimen,per.description person,ci.description city,doc.description as type_document
,de.description department,c.document,c.verification,c.address,c.mobil,c.business_name,c.status_id,c.executive_id
from clients c
JOIN parameters reg ON reg.code=c.regimen_id and reg.group='regimen_id'
JOIN parameters per ON per.code=c.person_id and per.group='person_id'
JOIN parameters doc ON doc.code=c.document_id and doc.group='type_document'
JOIN cities ci ON ci.id=c.city_id
JOIN departments de ON de.id=c.department_id;

create view vusers as 
select u.id,u.name,u.last_name,u.email, rol.description as role,cli.business_name client
from users u
JOIN parameters rol ON rol.code=u.role_id and rol.group='role_id'
LEFT JOIN clients cli ON cli.id=u.client_id;