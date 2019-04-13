SELECT o.org_id, o.position_id, p.name AS ProductName
FROM `order` o
JOIN `position` p ON o.position_id = p.id
WHERE p.org_id = 11;
