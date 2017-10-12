--crea biografic cuando una order es generada
CREATE OR REPLACE FUNCTION orders() RETURNS trigger AS $orders$
	BEGIN
		insert INTO biografic(order_id,status_id,created_at) values(NEW.id,1,now());
		insert INTO academic(order_id,status_id,created_at) values(NEW.id,1,now());
		insert INTO juridic(order_id,status_id,created_at) values(NEW.id,1,now());
		insert INTO anotations(order_id,status_id,created_at) values(NEW.id,1,now());
		insert INTO laboral(order_id,status_id,created_at) values(NEW.id,1,now());
		insert INTO domicile(order_id,status_id,created_at) values(NEW.id,1,now());
                insert INTO photo(order_id,status_id,created_at) values(NEW.id,1,now());
	return NEW;
	END;
$orders$ LANGUAGE plpgsql;


DROP TRIGGER  IF EXISTS orders ON orders;
CREATE TRIGGER orders BEFORE INSERT ON orders
    FOR EACH ROW EXECUTE PROCEDURE orders();


--actualizar estado de la order

CREATE OR REPLACE FUNCTION biografic() RETURNS trigger AS $biografic$
	BEGIN
		UPDATE orders set status_id=2 , event_id=3 , updated_at=now() where id=NEW.order_id;
	return NEW;
	END;
$biografic$ LANGUAGE plpgsql;


DROP TRIGGER  IF EXISTS biografic ON biografic;
CREATE TRIGGER biografic BEFORE UPDATE ON biografic
    FOR EACH ROW EXECUTE PROCEDURE biografic();

--actualizar estado de la order

CREATE OR REPLACE FUNCTION academic() RETURNS trigger AS $academic$
	BEGIN
		UPDATE orders set status_id=2 , event_id=4 , updated_at=now() where id=NEW.order_id;
	return NEW;
	END;
$academic$ LANGUAGE plpgsql;


DROP TRIGGER  IF EXISTS academic ON academic;
CREATE TRIGGER biografic BEFORE UPDATE ON academic
    FOR EACH ROW EXECUTE PROCEDURE academic();


--actualizar estado de la order

CREATE OR REPLACE FUNCTION juridic() RETURNS trigger AS $juridic$
	BEGIN
		UPDATE orders set status_id=2 , event_id=5 , updated_at=now() where id=NEW.order_id;
	return NEW;
	END;
$juridic$ LANGUAGE plpgsql;


DROP TRIGGER  IF EXISTS juridic ON juridic;
CREATE TRIGGER biografic BEFORE UPDATE ON juridic
    FOR EACH ROW EXECUTE PROCEDURE juridic();

--actualizar estado de la order

CREATE OR REPLACE FUNCTION juridic() RETURNS trigger AS $anotations$
	BEGIN
		UPDATE orders set status_id=2 , event_id=6 , updated_at=now() where id=NEW.order_id;
	return NEW;
	END;
$anotations$ LANGUAGE plpgsql;


DROP TRIGGER  IF EXISTS anotations ON anotations;
CREATE TRIGGER anotations BEFORE UPDATE ON anotations
    FOR EACH ROW EXECUTE PROCEDURE anotations();

--actualizar estado de la order

CREATE OR REPLACE FUNCTION laboral() RETURNS trigger AS $laboral$
	BEGIN
		UPDATE orders set status_id=2 , event_id=7, updated_at=now() where id=NEW.order_id;
	return NEW;
	END;
$laboral$ LANGUAGE plpgsql;


DROP TRIGGER  IF EXISTS laboral ON laboral;
CREATE TRIGGER laboral BEFORE UPDATE ON laboral
    FOR EACH ROW EXECUTE PROCEDURE laboral();

--actualizar estado de la order

CREATE OR REPLACE FUNCTION domicile() RETURNS trigger AS $domicile$
	BEGIN
		UPDATE orders set status_id=2 , event_id=8 , updated_at=now() where id=NEW.order_id;
	return NEW;
	END;
$domicile$ LANGUAGE plpgsql;


DROP TRIGGER  IF EXISTS domicile ON domicile;
CREATE TRIGGER domicile BEFORE UPDATE ON domicile
    FOR EACH ROW EXECUTE PROCEDURE domicile();

