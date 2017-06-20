--crea biografic cuando una order es generada
CREATE OR REPLACE FUNCTION orders() RETURNS trigger AS $orders$
	BEGIN
		insert INTO biografic(order_id,status_id,created_at) values(NEW.id,1,now());
		insert INTO academic(order_id,status_id,created_at) values(NEW.id,1,now());
		insert INTO juridic(order_id,status_id,created_at) values(NEW.id,1,now());
		insert INTO anotations(order_id,status_id,created_at) values(NEW.id,1,now());
		insert INTO laboral(order_id,status_id,created_at) values(NEW.id,1,now());
		insert INTO domicile(order_id,status_id,created_at) values(NEW.id,1,now());
	return NEW;
	END;
$orders$ LANGUAGE plpgsql;


DROP TRIGGER  IF EXISTS orders ON orders;
CREATE TRIGGER orders BEFORE INSERT ON orders
    FOR EACH ROW EXECUTE PROCEDURE orders();


--actualizar estado de la order

CREATE OR REPLACE FUNCTION biografic() RETURNS trigger AS $biografic$
	BEGIN
		UPDATE orders set status_id=2,updated_at=now() where id=NEW.order_id;
	return NEW;
	END;
$biografic$ LANGUAGE plpgsql;


DROP TRIGGER  IF EXISTS biografic ON biografic;
CREATE TRIGGER biografic BEFORE UPDATE ON biografic
    FOR EACH ROW EXECUTE PROCEDURE biografic();