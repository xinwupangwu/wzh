ORG 0000H
SJMP MAIN
ORG 0040H
MAIN:
	MOV DPTR ,#0F200H
	MOV A, #00FH
	MOVX @DPTR,A
	acall DELAY

	MOV A, #0A6H
	MOVX @DPTR,A
	acall DELAy	
//闪
	MOV A, #0A6H
	MOVX @DPTR,A
	acall DELAy	
//闪
	MOV A, #0A6H
	MOVX @DPTR,A
	acall DELAy		
//南北黄东西红	
	MOV A, #006H
	MOVX @DPTR,A
	acall DELAY
//南北红东西绿
	MOV A, #06aH
	MOVX @DPTR,A
	acall DELAy
	
		MOV A, #06aH
	MOVX @DPTR,A
	acall DELAy

		MOV A, #06aH
	MOVX @DPTR,A
	acall DELAy
//南北红东西黄
		MOV A, #00aH
	MOVX @DPTR,A
	acall DELAy

	
	sjmp main


DELAY:
		MOV R0,#00H
DELAY1:
		MOV R1,#0B3H
		DJNZ R1,$
		DJNZ R0,DELAY1
		RET
END