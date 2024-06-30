export default {
    testEnvironment: 'jsdom',
    transform: {
      '^.+\\.jsx?$': 'babel-jest',
    },
    setupFilesAfterEnv: ['<rootDir>/jest.setup.js'],
    testMatch: [
      "**/resources/__tests__/**/*.test.js",
      "**/resources/__tests__/**/*.spec.js"
    ],
    moduleNameMapper: {
      '^@/(.*)$': '<rootDir>/resources/js/$1'
    }
  };
