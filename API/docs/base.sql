-- Crear la tabla `productos`
CREATE TABLE productos (
  id INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL,
  descripción VARCHAR(255) NOT NULL,
  precio DECIMAL(10,2) NOT NULL,
  stock INT NOT NULL,
  PRIMARY KEY (id)
);

-- Crear la tabla `categorías`
CREATE TABLE categorías (
  id INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL,
  descripción VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

-- Agregar una relación entre las tablas
ALTER TABLE productos
  ADD COLUMN categoría_id INT NOT NULL,
  ADD FOREIGN KEY (categoría_id) REFERENCES categorías (id);