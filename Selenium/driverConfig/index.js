const {Builder, By, Key, util} = require("selenium-webdriver");
async function example(){
    let driver = await new Builder().forBrowser("firefox").build();
    await driver.get("http://localhost/aplicacionwebmesadeayuda/index.html");
    await driver.findElement(By.name("login")).sendKeys("admin",Key.RETURN);
    await driver.findElement(By.name("password")).sendKeys("admin",Key.RETURN);
    const btnLogion= driver.findElement(By.className("fadeIn fourth"));
    btnLogin.click();
    const spanElement = await driver.findElement(By.xpath("//span[contains(@class, 'fas fa-home')]"));
    await spanElement.click();
    const spanElement2 = await driver.findElement(By.xpath("//span[contains(@class, 'fas fa-users')]"));
    await spanElement.click();
    const btnCrear= driver.findElement(By.className("btn btn-primary"));
    btnCrear.click();
    let llenar;
    for(let i=0; i<12;i++)
    {
        const apellidoPaternoInput = await driver.findElement(By.id('paterno')); 
        await nombreInput.sendKeys('rodriguez'); 
        const apellidoMaternoInput = await driver.findElement(By.id('materno')); 
        await nombreInput.sendKeys('mendez');
        const nombreInput = await driver.findElement(By.id('nombre')); 
        await nombreInput.sendKeys('carlos');
        const fechaInput = await driver.findElement(By.id('fechaNac')); 
        await fechaInput.sendKeys('10-11-1987');
        const GeneroInput = await driver.findElement(By.id('genero')); 
        await GeneroInput.sendKeys('Masculino');
        const telefonoInput = await driver.findElement(By.id('telefono')); 
        await telefonoInput.sendKeys('9213213243');
        const correoInput = await driver.findElement(By.id('correo')); 
        await correoInput.sendKeys('carlosmher@uv.mx');
        const usuarioInput = await driver.findElement(By.id('cliente')); 
        await usuarioInput.sendKeys('cliente');
        const passwordInput = await driver.findElement(By.id('password')); 
        await passwordInput.sendKeys('carlosmher');
        const rolInput = await driver.findElement(By.id('rol')); 
        await rolInput.sendKeys('cliente');
        const ubicacionInput = await driver.findElement(By.id('ubicacion')); 
        await ubicacionInput.sendKeys('moduloV');
        const btnAgregar= driver.findElement(By.className("btn btn-guardar"));
        btnAgregar.click();
        btnAgregar.submit();
        llenar = llenar+1; 
    }
    const spanElement3 = await driver.findElement(By.xpath("//span[contains(@class, 'fas fa-assystive-listening-systems')]"));
    await spanElement.click();   
    const btnAsignar= driver.findElement(By.className("btn btn-primary"));
    btnAsignar.click();
    const selectedOptionList = await select.getAllSelectedOptions();
    await select.selectByVisibleText('perez gutierrez tom');
    const selectedOptionList2 = await select.getAllSelectedOptions();
    await select.selectByVisibleText('aplicacion web');
    let llenar2;
    for(let i=0; i<12;i++)
    {
        const aplicacionInput = await driver.findElement(By.id('aplicacion')); 
        await aplicacionInput.sendKeys('web');
        const funcionInput = await driver.findElement(By.id('funcion')); 
        await funcionInput.sendKeys('automatizar');
        const direccionInput = await driver.findElement(By.id('direccion')); 
        await direccionInput.sendKeys('https://www.out.com');
        const descripcionInput = await driver.findElement(By.id('descripcion')); 
        await descripcionInput.sendKeys('aplicacion que ayuda a levantar ayudas');
        const nombreInput = await driver.findElement(By.id('nombre')); 
        await nombreInput.sendKeys('servicio');
        const protocoloInput = await driver.findElement(By.id('protocolo')); 
        await protocoloInput.sendKeys('http');
        const btnAgregar= driver.findElement(By.className("btn btn-guardar"));
        btnAgregar.click();
        btnAgregar.submit();
        llenar2 = llenar2+1; 
    }
    const spanElement4 = await driver.findElement(By.xpath("//span[contains(@class, 'fas fa-directive')]"));
    await spanElement.click();  
    for (i = 1; i <= rowCount; i++) 
    {
         sCellValue = driver.findElement(By.xpath("XPATH Of Name row")).getText();

        if (sCellValue.equalsIgnoreCase(Name)) 
        {
             driver.findElement(By.xpath("xpath of add")).click();
        }
    }
    const btnSolucionar= driver.findElement(By.className("btn btn-sol"));
    btnSolucionar.click();
    const solucionInput = await driver.findElement(By.id('solucion')); 
        await solucionInput.sendKeys('se checara');
    
    const selectedOptionList3 = await select.getAllSelectedOptions();
    await select.selectByVisibleText('abierto');
}
example();