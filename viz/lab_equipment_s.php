SELECT DISTINCT(research_lab_i.instrument_name),research_lab_i.status,institution.iname,institution.cid,state_codes.name
FROM research_lab_i,institution,state_codes
WHERE research_lab_i.cid=institution.cid AND institution.code=state_codes.codes
