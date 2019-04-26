SELECT o.id, p.name, org.name, o.org_id, o.position_id, org2.name, o.number, ord.data, ord.id AS order_number
FROM `order` o
JOIN `position` p ON p.id = o.position_id
JOIN organizations org ON org.id = o.org_id
JOIN organizations org2 ON p.org_id = org2.id
JOIN order_group ord ON o.order_group_id = ord.id
WHERE org2.id = 11