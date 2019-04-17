SELECT o.id, p.name, org.name, o.org_id, o.position_id, org2.name, o.number
FROM `order` o
JOIN `position` p ON p.id = o.position_id
JOIN organizations org ON org.id = o.org_id
JOIN organizations org2 ON p.org_id = org2.id
#WHERE org2.id = 31
;

SELECT o.id, o2.name `from`, o1.name `to`, o.position_id, p.name, p.price
FROM `order` o
JOIN `position` p ON o.position_id = p.id
JOIN organizations o1 ON p.org_id = o1.id
JOIN organizations o2 ON o.org_id = o2.id
;

SELECT o.id, o.name, ot.name 
FROM organizations o
JOIN org_type ot ON o.org_type_id = ot.id
;

SELECT p.id, p.name, p.price, ot.name
FROM `position` p
JOIN organizations o ON p.org_id = o.id
JOIN org_type ot ON o.org_type_id = ot.id
;

SELECT o.id, o.name, u.username, u.name, ot.name
FROM organizations o
JOIN org_type ot ON o.org_type_id = ot.id
JOIN user u ON u.id = o.user_id
;
