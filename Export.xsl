<?xml version="1.0" encoding="ISO8859-1" ?> 
<html xmlns:xsl="http://www.w3.org/TR/WD-xsl">
<body bgcolor="FFFFD9">
<table border="0" bgcolor="0066CC" width="100%">
<tr>
<td><font face="Tahoma" color="FFFFD9" size="+2">MaTABLE</font></td>
</tr>
</table>
<p/>
<center>
<table border="1" bordercolor="FFFFD9" cellpadding="3">
<tr>
<td bgcolor="A0A0A0"><font face="Tahoma"><b>DatEch</b></font></td>
<td bgcolor="A0A0A0"><font face="Tahoma"><b>Date_Limite</b></font></td>
</tr>
<xsl:for-each select="WINDEV_TABLE/MaTABLE">
  <tr>
<td bgcolor="C9E3ED"><font face="Tahoma" size="-1"><xsl:value-of select="DatEch" /></font></td>
<td bgcolor="EFEFEF"><font face="Tahoma" size="-1"><xsl:value-of select="Date_Limite" /></font></td>
  </tr>
</xsl:for-each>
</table>
</center>
</body>
</html>
