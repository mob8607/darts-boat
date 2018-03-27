# Development

## 1 Frontend

### Install dependencies

To install the frontend dependencies you need [npm](https://www.npmjs.com/get-npm) installed.
After you install it run the following command in the project root directory:

```bash
npm install
```

## 2 Commands

### 2.1 Frontend commands

In `package.json` the following `scripts` are configured:

| Name                   | Description
|------------------------|--------------------------------------------------------------
| npm run build          | Build the frontend application and minify it
| npm run watch          | Watch for continues build in development on file change
| npm run lint:js        | Lint the js files
| npm run lint:js:fix    | Lint the js files and try automatically to fix errors
| npm run lint:scss      | Lint the scss files
| npm run lint:scss:fix  | Lint the scss files and try automatically to fix errors

### 2.2 Backend commands

You can use e.g. `bin/console server:run` to use the php internal webserver for development.

Get a list of all available `symfony` commands by running `bin/console list`.

## 3 Instructions

### 3.1 Build application

When changing something in the frontend before commit this changes run `npm run build`.

## 4 Overridden Files and Services

[TODO: Mention overridden classes, services, core functionality,... here and describe why it was overridden.]
